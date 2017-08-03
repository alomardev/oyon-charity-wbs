$(function() {
	/* slide show */
	var i = 0;
	var images = ['banner1.jpg', 'banner2.jpg'];
	$('.slide-show-next-btn').on('click', function() {
		changeImage(1);
	});
	$('.slide-show-prev-btn').on('click', function() {
		changeImage(-1);
	});
	var changeImage = function(increment) {
		i += increment;
		if (i > images.length - 1) {
			i = 0;
		}
		if (i < 0) {
			i = images.length - 1;
		}
		$('.slide-show-image').css('background-image', "url(/res/" + images[i] + ")");
	};
	var interval = setInterval(function() {changeImage(1);}, 4000);

	/* ibans button */
	var ibansBox = $('#card-ibans .content-box');
	$('#card-ibans .content-show-btn').on('click', function() {

		$.ajax({
			url: "/raw/ibans.json",
			context: this,
			success: function(data) {
				$(this).removeClass('content-show-btn');
				var rows = "";
				for (var i in data) {
					rows += "<tr style='background-color: " + data[i].color + ";'><td>" + data[i].title + "</td><td>" + data[i].iban + "</td></tr>";
				}
				ibansBox.html("<table><tbody>" + rows + "</tbody></table>");
			}
		});
	});
});