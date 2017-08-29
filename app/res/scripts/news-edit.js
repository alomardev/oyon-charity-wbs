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
	var action = "";
	$("button[name=save]").on('click', function() {
		message("جاري الحفظ...", false);
		action = "save";
	});
	$("button[name=delete]").on('click', function() {
		message("جاري الحذف...", true);
		action = "delete";
	});

	var form = $("form[name=news-form]");
	form.submit(function(e) {

		e.preventDefault();
			
			$.ajax({
				url: "/phps/editor-requests.php",
				type: "POST",
				data: form.serialize()+"&action="+action+"&content="+CKEDITOR.instances['editor'].getData(),
				success: function(data) {
					if (data.error) {
						message(data.message, true);
					} else {
						if (data.message.startsWith("inserted")) {
							window.location="/apps/nms/edit.php?id="+data.message.split("|")[1];
						}
						if (data.message.startsWith("deleted")) {
							window.location="/apps/nms/list.php";
						}
						message(data.message, false);
					}
				},
				error: function(xhr, status, error) {
					message("لم تتم العملية!... عاود المحاولة.");
				}
			});
		});
});

function message(message, error) {
	$("#message").toggleClass("error-text", error);
	$("#message").html(message);
}