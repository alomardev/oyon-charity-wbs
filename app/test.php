<?php
$link = mysqli_connect('localhost', 'root', 'P@ssw0rd', 'test');
if (!$link) {
	echo mysqli_error($link);
} else {
	echo 'successfully connected';
}
?>
