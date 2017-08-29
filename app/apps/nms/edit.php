<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$id = $id == 'new' ? 0 : $id;
?>
@@include("../../_header.php", {"title": "تحرير", "active": "news-app"})
<div class='page-wrapper' id='news-edit'>
@@include("_toolbar.php", {"active": "edit"})
<div id="editor-container">

<?php

date_default_timezone_set("Asia/Riyadh");

$news_post = NULL;
if ($id > 0) {
	$result = select("SELECT * FROM `news_post` WHERE `id`=$id");
	if ($result) {
		$news_post = mysqli_fetch_assoc($result);
		$dateSegs = explode(" ", $news_post['date']);
		$segs = explode("-", $dateSegs[0]);
		$y = $segs[0];
		$m = $segs[1];
		$d = $segs[2];
		$segs = explode(":", $dateSegs[1]);
		$hours=$segs[0];
		$minutes=$segs[1];

	}
} else {
	$segs = explode("-", date("Y-m-d"));
	$y = $segs[0];
	$m = $segs[1];
	$d = $segs[2];
}
?>

	<form name='news-form' action='POST'>
		<input type="hidden" name='id' value="<?php echo $id; ?>">
		<div class="inputs-container">
			<div class='input fill-width inputs-container'>
				<label class='input label' for="title">العنوان:</label>
				<input class='input fill-width' type="text" name='title' value="<?php echo is_null($news_post) ? "" : $news_post["title"]; ?>">
			</div>
			<label class='input' title="التاريخ بالميلادي">التاريخ: <bdo dir="ltr"><input type="text" name='date-year' placeholder="السنة" value="<?php echo $y; ?>"> - <input type="number" name='date-month' placeholder="الشهر" value="<?php echo $m; ?>"> - <input type="number" name='date-day' placeholder="اليوم" value="<?php echo $d; ?>"></bdo></label>
			<label class='input' title="الوقت بنظام ٢٤">الوقت: <bdo dir="ltr"><input type="number" name='time-hours' placeholder="س" value="<?php echo isset($hours) ? $hours : ""; ?>">:<input type="number" name='time-minutes' placeholder="د" value="<?php echo isset($minutes) ? $minutes : ""; ?>"></bdo></label>
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
@@include("../../_footer.php", {"scripts": ["https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js", "/res/news-edit.js"]})