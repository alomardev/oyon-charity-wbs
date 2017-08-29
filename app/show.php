@@include("_header.php", {"title": "الهيكل الإداري", "active": "none"})
<?php
$id = isset($_GET["p"]) ? $_GET["p"] : 0;
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

if (!$failed) {
	$result = select("SELECT * FROM `news_post` WHERE `id`=$id;");
	if ($result and mysqli_num_rows($result) > 0) {
		$post = mysqli_fetch_assoc($result);
	} else {
		$failed = true;
	}
}
?>

<div class="page-wrapper" id="show-post">

<?php
if ($failed) {
	echo "<p class='error'>حدث خطأ ما!</p>";
} else {
?>

@@include("_news-post.php")

<?php
}
?>

</div>
@@include("_footer.php", {"scripts": []})