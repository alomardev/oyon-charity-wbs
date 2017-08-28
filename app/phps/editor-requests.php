<?php
require_once "app.php";

$message = "حدث خطأ";
$error = true;
if (!authorized(APP_NMS) || !isset($_POST["id"])) {
	echo feedback($message, $error);
	exit;
}

$id = $_POST["id"];
$title = isset($_POST["title"]) ? "'".$_POST["title"]."'" : "";
$date = isset($_POST["date"]) ? "'".$_POST["date"]."'" : "CURRENT_TIMESTAMP";
$content = isset($_POST["content"]) ? "'".htmlspecialchars($_POST["content"])."'" : "!";
$header_image = isset($_POST["header_image"]) ? "'".$_POST["header_image"]."'" : "";
$author_id = getUser()['id'];
$action = isset($_POST["action"]) ? $_POST["action"] : "";

$query = "";
$append_new_id = false;
if ($action == "save") {
	$query = "SET `title`=$title, `date`=$date, `content`=$content, `header_image`=$header_image, `author_id`=$author_id";
	if ($id == 0) {
		$query = "INSERT INTO `news_post` ".$query;
		$message = "inserted";
		$append_new_id = true;
	} else {
		$query = "UPDATE `news_post` ".$query." WHERE `id`=$id";
		$message = "تم تحديث الخبر";
	}
} elseif ($action == "delete") {
	$query = "DELETE FROM `news_post` WHERE `id`=$id";
	$message = "deleted|$id";
}

$result = select($query);

if (!$result) {
	$message = "لم تتم العملية!";
} else {
	$error = false;
	if ($append_new_id) {
		$new_id = mysqli_insert_id($link);
		$message .= "|$new_id";
	}
}
echo feedback($message, $error);
?>