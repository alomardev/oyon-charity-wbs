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

function feedback($message, $error = false) {
	header('Content-Type: application/json; charset=utf-8');
	return json_encode(array("message" => $message, "error" => $error));
}
?>