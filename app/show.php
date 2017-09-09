@@include("_header.php", {"title": "خبر", "active": "none"})
<?php
$id = isset($_GET["p"]) ? $_GET["p"] : 0;

$failed = false;

if (!$failed) {
	$query = "SELECT `id`, `title`, `date`, `content`, `header_image`, (SELECT COUNT(*) FROM `visitor` WHERE `news_post`.`id`=`visitor`.`post_id`) AS `visits` FROM `news_post` WHERE `id`=$id;";
	$result = select($query);
	if ($result and mysqli_num_rows($result) > 0) {
		$post = mysqli_fetch_assoc($result);
	} else {
		$failed = true;
	}
}

if (!$failed) {
	incrementVisitor($id);
}

$posts_info = getPosts("visits", 0, 0, 100);
?>

<div class="page-wrapper" id="show-post">

<?php
if ($failed) {
	echo "<p class='error'>حدث خطأ ما!</p>";
} else {
?>

<div id="post-container">
@@include("_news-post.php")
</div>

<div class="most-visited-container">
	<h4>اقرأ المزيد</h4>
	<div class="news-holder">
		<?php	foreach ($posts_info as $p) {	?>
			<a href='show.php?p=<?php echo $p['id']; ?>' class='news-post-item'>
				<div class='news-post-image' style="background-image: url(<?php echo $p['header_image']; ?>)"></div>
				<div class='news-post-content'>
					<div class='news-post-title ellipsis'><?php echo $p['title']; ?></div>
					<div class='news-post-summary ellipsis'><?php echo $p['content']; ?></div>
				</div>
			</a>
		<?php } ?>
	</div>
</div>

<?php
}
?>

</div>
@@include("_footer.php", {"scripts": []})