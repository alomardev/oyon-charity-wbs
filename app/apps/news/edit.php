@@include("../../_top.php", {"type": "site", "title": "تحرير"})
@@include("../../_header.php", {"active": "news-app"})
<div class='page-wrapper' id='news-edit'>
@@include("_toolbar.php", {"active": "new"})
<div id="editor-container">
	<form>
		<div class='loading-medium'></div>
		<textarea name="editor"></textarea>
	</form>
</div>
</div>
@@include("../../_footer.php")
@@include("../../_bottom.php", {"scripts": ["https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js", "/res/news-edit.js"]})