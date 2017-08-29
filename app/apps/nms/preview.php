@@include("../../_header.php", {"title": "قائمة الأخبار", "active": "news-app"})
<div class='page-wrapper' id='news-preview'>
@@include("_toolbar.php", {"active": "none"})
<?php $id = isset($_GET['id']) ? $_GET['id'] : 0; ?>
<h1 class='page-title'>معاينة الخبر</h1>
<div class="preview-wrapper">

<?php
$result = select("SELECT * FROM `news_post` WHERE `id`=$id");
if (!$result or mysqli_num_rows($result) == 0) {
	echo "<p class='error'>لم يتم العثور على الخبر!</p>";
} else {
	$post = mysqli_fetch_assoc($result);
?>

@@include("../../_news-post.php")

<?php } ?>
</div>
<hr>
<div class="preview-wrapper actions-container u-cf">
	<a href="/apps/nms/edit.php?id=<?php echo $id; ?>" class='button u-fl'>تعديل</a>
</div>

</div>
@@include("../../_footer.php", {"scripts": []})