<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$id = $id == 'new' ? 0 : $id;
?>
@@include("../../_header.php", {"title": "تحرير", "active": "news-app"})
<div class='page-wrapper' id='news-edit'>
@@include("_toolbar.php", {"active": "edit"})
<div id="editor-container">
	<form name='news-form' action='POST'>
		<div class="inputs-container">
			<div class='input fill-width inputs-container'>
				<label class='input label' for="title">العنوان:</label>
				<input class='input fill-width' type="text" name='title'>
			</div>
			<label class='input' for="date">التاريخ: <input type="date" name='date'></label>
		</div>
		<hr>
		<div class='loading-medium'></div>
		<textarea name="editor"></textarea>
		<hr>
		<div class="inputs-container">
			<label class='input label' for="title">رابط صورة الخبر:</label>
			<input class='input fill-width' type="text" name='title'>
		</div>
		<hr>
		<div class="actions-container u-cf">
			<div id='message' class="u-fr"></div>
			<button class='u-fl' name='publish'>نشر</button>
			<button class='u-fl' name='save'>حفظ</button>
			<button class='u-fl danger' name='delete'>حذف</button>
		</div>
	</form>
</div>
</div>
@@include("../../_footer.php", {"scripts": ["https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js", "/res/news-edit.js"]})