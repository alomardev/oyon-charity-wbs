<?php
$message = "";
$error = true;

require_once "app.php";

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

$result = select("SELECT * FROM `user` WHERE `username`='$username' AND BINARY `password`='$password';");
if (!$result) {
	$message = mysqli_error($link);
} elseif(mysqli_num_rows($result) == 0) {
	$message = "لم يتم العثور على المستخدم";
} else {
	setUser(mysqli_fetch_assoc($result));

	$error = false;
	$message = "تم تسجيل الدخول. ستتم إعادة التوجيه...";
}

echo feedback($message, $error);

exit;
?>
