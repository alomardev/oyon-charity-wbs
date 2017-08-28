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
	$("button[name=save]").on('click', function() {
		message("جاري الحفظ...");
	});
	$("button[name=publish]").on('click', function() {
		message("جاري النشر...");
	});
	$("button[name=delete]").on('click', function() {
		message("جاري الحذف...");
	});

	var submitted = false;
	var form = $("form[name=news-form]");
	form.submit(function(e) {
		e.preventDefault();
		if (!submitted) {
			submitted = true;
			
			$.ajax({
				url: "/phps/editor-requests.php",
				type: "POST",
				data: form.serialize(),
				success: function(data) {
					if (data.error) {
						submitted = false;
						message(data.message, true);
					} else {
						message(data.message, false);
					}
				},
				error: function(xhr, status, error) {
				}
			});
		}
	});
});

function message(message, error) {
	$("#message").toggleClass("error-text", error);
	$("#message").html(message);
}