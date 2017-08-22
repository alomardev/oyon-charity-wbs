@@include("../../_top.php", {"type": "site", "title": "تحرير"})
@@include("../../_header.php", {"active": "news-app"})
<div class='page-wrapper' id='news-edit'>
@@include("_toolbar.php", {"active": "new"})
<div id="editor-container">
	<form>
		<textarea name="editor" id="editor"></textarea>
	</form>
</div>
</div>
@@include("../../_footer.php")
<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('editor', {
	language: 'ar',
	toolbar :
		[
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste', '-','Undo','Redo' ] },
			{ name: 'basicstyles', items : ['Bold', 'Italic'] },
			{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'insert', items : [ 'Image','Table','HorizontalRule'] },
			{ name: 'colors', items : [ 'TextColor','BGColor' ] },
			{ name: 'paragraph', items : ['NumberedList','BulletedList'] },
			{ name: 'tools', items : ['Maximize'] }
		]
});
</script>
@@include("../../_bottom.php")