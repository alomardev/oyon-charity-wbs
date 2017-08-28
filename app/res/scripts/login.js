$(function() {
	var form = $("#login-form");
	var submitted = false;
	form.submit(function(event) {
		event.preventDefault();
		if (!submitted) {
			submitted = true;
			$.ajax({
				url: "/phps/login-request.php",
				type: "post",
				data: form.serialize(),
				success: function(data) {
					if (data.error) {
						submitted = false;
						message(data.message, true);
					} else {
						message(data.message, false);
						window.location = "/apps";
					}
				},
				error: function(data) {
					submitted = false;
					message("لم يتم الاتصال", true);
				}
			});
		}
	});
});

function message(message, error) {
	$("#message").toggleClass("error-text", error);
	$("#message").html(message);
}