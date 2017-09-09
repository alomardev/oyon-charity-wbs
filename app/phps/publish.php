<?php
$approved = isset($_GET["a"]) and $_GET["a"] > 1;
if ($approved) {
	$id = $_GET["a"];
}

$failed = false;
if ($approved and authorized(APP_NMS)) {
	$result = select("UPDATE `news_post` SET `published`=1 WHERE `id`=$id;");
	if (!$result) {
		echo mysqli_error($link);
		$failed = true;
	}
}

header("Location: /show.php?p=$id");
exit;
?>