$(function() {
	CKEDITOR.replace('editor', {
		language: 'ar',
		toolbar :
			[
				{ name: 'clipboard', items : [ 'Cut','Copy','Paste', '-','Undo','Redo' ] },
				{ name: 'basicstyles', items : ['Bold', 'Italic'] },
				{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
				{ name: 'insert', items : [ 'Image','Table','HorizontalRule'] },
				{ name: 'paragraph', items : ['NumberedList','BulletedList'] },
				{ name: 'tools', items : ['Maximize'] }
			]
	});
	CKEDITOR.on('instanceReady', function() {
		$(".loading-medium").css("display", "none");
	});
});