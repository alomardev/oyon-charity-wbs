<?php
echo "<pre>";
require "server-const.php";

$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
if (!$link) {
	echo "Error while connecting to the server.\n".mysqli_error($link);
} else {
	echo "Successfully connected to the server.\n";
}

?>