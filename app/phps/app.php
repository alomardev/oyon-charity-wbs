<?php
define("HASH_KEY", "90bFc0b14ef7229d049x56779a4387Zc694DeE38006D1433bcF0Az96x15E28af8058A312Y99DE95uA3277A01946c24ebdc5131A257");

// These values should match the ones in charity-main->app
define("APP_NMS", 2);
define("APP_BMS", 3);
define("APP_CCS", 4);

$apps_data = array(array("id"=>APP_NMS, "dir"=>"nms", "title"=>"نظام تحرير الأخبار"),
                   array("id"=>APP_BMS, "dir"=>"bms", "title"=>"نظام إدارة معلومات المستفيدين"),
                   array("id"=>APP_CCS, "dir"=>"ccs", "title"=>"نظام تواصل اللجان"));

$user_data = null;

/* Database */

require_once "connect.php";

function select($query) {
	global $link;

	if (!$link) {
		return false;
	}

	return mysqli_query($link, $query);
}

/* User */

function setUser($user) {
	$hashed_id = $user['id'].'|'.hash('sha512', $user['id'].HASH_KEY);
	setcookie("uid", $hashed_id, time() + 86400 * 2, "/");
}

function unsetUser() {
	setcookie("uid", "", 0, "/");
}

function getUser() {
	global $user_data;

	if (isset($user_data)) {
		return $user_data;
	}

	if (!isset($_COOKIE['uid'])) {
		 return false;
	}

	$user_data = array();

	$segs = explode("|", $_COOKIE['uid']);
	
	if (count($segs) != 2) {
		return false;
	}

	$hashed_id = hash('sha512', $segs[0].HASH_KEY);

	if ($hashed_id !== $segs[1]) {
		return false;
	}

	$result = select("SELECT `nickname`, `email` FROM `user` WHERE `id`=$segs[0];");
	
	if (!$result) {
		return false;
	}

	$row = mysqli_fetch_assoc($result);

	$nickname = $row['nickname'];
	$email = $row['email'];

	$apps = array();

	$query = "SELECT `app_id` FROM `user_app` INNER JOIN `user` ON `user`.`id`=`user_app`.`user_id` AND `user`.`id`=$segs[0];";
	$result = select($query);
	
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$apps[] = $row['app_id'];
		}
	}

	$user_data['id'] = $segs[0];
	$user_data['nickname'] = $nickname;
	$user_data['email'] = $email;
	$user_data['apps'] = $apps;

	return $user_data;
}

function authorized($app_id) {
	$user = getUser();

	if (!$user) {
		return false;
	}

	return in_array($app_id, $user['apps']);
}

function getAppInfo($app_id) {
	global $apps_data;
	for ($i = 0; $i < count($apps_data); $i++) { 
		if ($apps_data[$i]['id'] == $app_id) {
			return $apps_data[$i];
		}
	}
	return false;
}

/* news */
function getHighlightedPosts() {
	$hps = array();

	$result = select("SELECT * FROM `highlighted_news_post;");

	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$hps[] = $row['post_id'];
		}
	}

	return getPosts("visits", $hps, 0, 100);
}

function getPosts($sort = 'date', $limit = 0, $offset = 0, $summary = 0) {
	global $link;
	$posts_info = array();
	if ($summary > 0) {
		$content = "SUBSTR(`content`, 1, $summary) AS `content`";
	} else {
		$content = `content`;
	}
	$query = "SELECT `id`, `title`, `date`, $content, `header_image`, (SELECT COUNT(*) FROM `visitor` WHERE `news_post`.`id`=`visitor`.`post_id`) AS `visits` FROM `news_post`";

	$sort_extra = " ORDER BY `$sort` DESC";
	$limit_extra = (is_array($limit) or $limit < 1) ? "" : " LIMIT $limit OFFSET $offset";
	$where_extra = "";

	if (is_array($limit)) {
		if (empty($limit)) {
			return array();
		}
		$where_extra = "";
		$first = true;
		foreach ($limit as $v) {
			if (!$first) {
				$where_extra .= " or";
			} else {
				$where_extra = " WHERE";
			}
			$where_extra .= " `id`=$v";
			$first = false;
		}
	}
	$query .= $where_extra . $sort_extra . $limit_extra;
	$result = select($query);
	if (!$result) {
		echo mysqli_error($link);
	}
	while ($row = mysqli_fetch_assoc($result)) {
		if ($summary > 0) {
			$row['content'] = strip_tags($row['content']);
			$row['content'] = substr($row['content'], 0, strripos($row['content'], " "))."...";
		}
		$posts_info[] = $row;
	}
	return $posts_info;
}

function incrementVisitor($post_id) {
	$ip = getIP();
	$result = select("SELECT UNIX_TIMESTAMP(`time`) AS `time` FROM `visitor` WHERE `ip`='$ip' AND `post_id`=$post_id ORDER BY `time` DESC LIMIT 1");
	if (mysqli_num_rows($result) > 0) {
		$visitor = mysqli_fetch_assoc($result);
	}
	if (!isset($visitor) or time() > $visitor['time'] + 86400 * 2) {
		select("INSERT INTO `visitor` (`ip`, `post_id`) VALUES ('$ip', '$post_id')");
		return true;
	}
	return false;
}

/* MISC */

function inPath($check_path) {
	$root_offset = strlen($_SERVER['DOCUMENT_ROOT']);
	$file_path = substr($_SERVER['SCRIPT_FILENAME'], $root_offset + 1);
	
	$file_seq = preg_split("/(\\\\|\\/)/", $file_path);
	$file_seq_len = count($file_seq);

	$check_seq = preg_split("/(\\\\|\\/)/", $check_path);
	$check_seq_len = count($check_seq);

	if ($file_seq_len < $check_seq_len) {
		return false;
	}

	for ($i=0; $i < $check_seq_len; $i++) { 
		if ($check_seq[$i] != $file_seq[$i]) {
			return false;
		}
	}

	return true;
}

function isImage($url) {
	$params = array('http' => array('method' => 'HEAD'));
	$ctx = stream_context_create($params);
	$fp = @fopen($url, 'rb', false, $ctx);

	if (!$fp) 
		return false;  // Problem with url

	$meta = stream_get_meta_data($fp);
	if ($meta === false) {
		fclose($fp);
		return false;  // Problem reading data from url
	}

	$wrapper_data = $meta["wrapper_data"];
	if(is_array($wrapper_data)) {
		foreach(array_keys($wrapper_data) as $hh) {
			if (substr($wrapper_data[$hh], 0, 19) == "Content-Type: image") {// strlen("Content-Type: image") == 19 
				fclose($fp);
				return true;
			}
		}
	}

	fclose($fp);
	return false;
}


function feedback($message, $error = false) {
	header('Content-Type: application/json; charset=utf-8');
	return json_encode(array("message" => $message, "error" => $error));
}

function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //to check ip is pass from proxy
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>