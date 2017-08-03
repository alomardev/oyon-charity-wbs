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
	$('#card-ibans button').on('click', function() {

		$.ajax({
			url: "/raw/ibans.json",
			success: function(data) {
				console.log(data);
			}
		});
	});
});