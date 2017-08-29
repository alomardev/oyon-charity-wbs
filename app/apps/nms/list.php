@@include("../../_header.php", {"title": "قائمة الأخبار", "active": "news-app"})
<div class='page-wrapper' id='news-list'>
@@include("_toolbar.php", {"active": "list"})
<div id="news-container">
<?php
$author_id = getUser()['id'];
$result = select("SELECT * FROM `news_post` WHERE `author_id`=$author_id");
$empty = true;
if ($result) {
	$empty &= mysqli_num_rows($result) == 0;
	while ($row = mysqli_fetch_assoc($result)) {
	$date = explode(" ", $row['date'])[0];
	$image_url = $row['header_image'];
	?>
	<div <?php if (!empty($image_url)) { echo "style='background-image: url($image_url);'"; } ?> class="post-item">
		<input class='post-item-checkbox' type='checkbox' name='post-<?php echo $row['id']; ?>'>
		<div class="post-item-title"><?php echo $row['title']; ?></div>
		<div class="post-item-date"><?php echo $date; ?></div>
	</div>
	<?php }
}
?>
</div>
<?php if ($empty) { ?>
	<p class='empty-view'>لم تتم كتابة أي خبر! قم بتحرير خبر جديد من <a href="/apps/nms/edit.php?id=new">هنا</a>.</p>
<?php } else { ?>
<hr>
<div class="input-container u-cf">
	<button class='u-fl'>حفظ التغييرات</button>
	<div class="u-fr"><small>الأخبار المحدد هي ما سيتم عرضه في الصفحة الرئيسية للموقع</small></div>
</div>
<?php } ?>
</div>
@@include("../../_footer.php", {"scripts": []})