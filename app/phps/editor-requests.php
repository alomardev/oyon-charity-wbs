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
$content = isset($_POST["content"]) ? "'".$_POST["content"]."'" : "!";
$published = (isset($_POST["publish"]) and $_POST['publish'] == 1) ? 1 : 0;

$year = isset($_POST["date-year"]) ? $_POST["date-year"] : "";
$month = isset($_POST["date-month"]) ? $_POST["date-month"] : "";
$day = isset($_POST["date-day"]) ? $_POST["date-day"] : "";
$hours = isset($_POST["time-hours"]) ? $_POST["time-hours"] : "";
$minutes = isset($_POST["time-minutes"]) ? $_POST["time-minutes"] : "";

if (empty($year) || empty($month) || empty($day)) {
	$date = "NOW()";
} else {
	$hours = empty($hours) ? "00" : $hours;
	$minutes = empty($minutes) ? "00" : $minutes;
	$date = "'$year-$month-$day $hours:$minutes:00'";
}

$header_image = isset($_POST["header_image"]) ? "'".$_POST["header_image"]."'" : "";
$action = isset($_POST["action"]) ? $_POST["action"] : "";

$query = "";
$append_new_id = false;
if ($action == "save" || $action == "preview") {
	$query = "SET `title`=$title, `date`=$date, `content`=$content, `header_image`=$header_image, `published`=$published";
	if ($id == 0) {
		$query = "INSERT INTO `news_post` ".$query;
		$message = "inserted";
		if ($action == "preview") $message = "preview";
		$append_new_id = true;
	} else {
		$query = "UPDATE `news_post` ".$query." WHERE `id`=$id";
		$message = "تم تحديث الخبر";
		if ($action == "preview") $message = "preview|$id";
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