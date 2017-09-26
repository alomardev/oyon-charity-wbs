<?php
require_once "app.php";

$fid = isset($_POST['fid']) ? $_POST['fid'] : 0;

$error = $fid == 0;
$message = "";


if (!$error and !select("DELETE FROM `phone` WHERE `file_id`=$fid;")) {
	$error = true;
	$message = mysqli_error($link);
}
if (!$error and !select("DELETE FROM `income` WHERE `file_id`=$fid;")) {
	$error = true;
	$message = mysqli_error($link);
}
if (!$error and !select("DELETE FROM `dependency` WHERE `file_id`=$fid;")) {
	$error = true;
	$message = mysqli_error($link);
}
if (!$error and !select("DELETE FROM `beneficiary` WHERE `file_id`=$fid;")) {
	$error = true;
	$message = mysqli_error($link);
}

echo feedback($message, $error);
?>