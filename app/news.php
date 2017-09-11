@@include("_header.php", {"title": "الأخبار", "active": "news"})

<?php
$limit = isset($_GET['t']) ? $_GET['t'] : 10;
$page = isset($_GET['p']) ? $_GET['p'] : 0;

$count = mysqli_fetch_assoc(select("SELECT COUNT(*) AS `count` FROM `news_post`;"))['count'];
$posts_info_most_visited = getPosts("visits", 0, 0, 100);
$posts_info = getPosts('date', $limit, $page * $limit, 120);

?>

<div class='page-wrapper' id='news'>

<div id="large-post-container">
	<h4>الأخبار</h4>
	<?php	foreach ($posts_info as $p) {	?>
	<div class='large-post-holder'>
		<div class='large-post-item'>
			<div style='background-image: url(<?php echo $p['header_image'] ?>);' class='large-post-image'></div>
			<div class='large-post-content'>
				<div class='large-post-content-title'><a href='/show.php?p=<?php echo $p['id']; ?>'><?php echo $p['title'] ?></a></div>
				<div class='large-post-content-summary'><?php echo $p['content'] ?></div>
			</div>
			<div class='large-post-visits'><small>الزيارات: <?php echo $p['visits'] ?></small></div>
		</div>
	</div>
	<?php } ?>
</div>

<div class="most-visited-container">
	<h4>الأكثر قراءة</h4>
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

</div>
@@include("_footer.php", {"scripts": []})