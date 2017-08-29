<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$id = $id == 'new' ? 0 : $id;
?>
@@include("../../_header.php", {"title": "تحرير", "active": "news-app"})
<div class='page-wrapper' id='news-edit'>
@@include("_toolbar.php", {"active": "edit"})
<div id="editor-container">

<?php
$news_post = NULL;
if ($id > 0) {
	$result = select("SELECT * FROM `news_post` WHERE `id`=$id");
	if ($result) {
		$news_post = mysqli_fetch_assoc($result);
	}
}
?>

	<form name='news-form' action='POST'>
		<input type="hidden" name='id' value="<?php echo $id; ?>">
		<div class="inputs-container">
			<div class='input fill-width inputs-container'>
				<label class='input label' for="title">العنوان:</label>
				<input class='input fill-width' type="text" name='title' value="<?php echo is_null($news_post) ? "" : $news_post["title"]; ?>">
			</div>
			<label class='input' title="التاريخ بالميلادي">التاريخ: <bdo dir="ltr"><input type="text" name='date-year' placeholder="السنة"> - <input type="number" name='date-month' placeholder="الشهر"> - <input type="number" name='date-day' placeholder="اليوم"></bdo></label>
			<label class='input' title="الوقت بنظام ٢٤">الوقت: <bdo dir="ltr"><input type="number" name='time-hours' placeholder="س">:<input type="number" name='time-minutes' placeholder="د"></bdo></label>
		</div>
		<hr>
		<div class='loading-medium'></div>
		<textarea id='editor'><?php echo is_null($news_post) ? "" : $news_post["content"]; ?></textarea>
		<hr>
		<div class="inputs-container">
			<label class='input label' for="header_image">رابط الصورة:</label>
			<input class='input fill-width' type="text" name='header_image' value="<?php echo is_null($news_post) ? "" : $news_post["header_image"]; ?>">
		</div>
		<hr>
		<div class="actions-container u-cf">
			<div id='message' class="u-fr"></div>
			<button class='u-fl' name='save'>حفظ</button>
			<button class='u-fl danger' name='delete'>حذف</button>
		</div>
	</form>
</div>
</div>
@@include("../../_footer.php", {"scripts": ["/res/datepicker.min.js", "https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js", "/res/news-edit.js"]})