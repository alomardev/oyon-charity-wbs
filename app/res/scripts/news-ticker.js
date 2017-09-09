$(function() {
	$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      $(":focus").blur();
      return false;
    }
  });
  var total = 0;
	var updateInputs = function(c, initial) {
		total = c;
		var container = $("#news-text-fields");
		var inputs = container.find("input[name^=nt]");
		var texts = [];
		if (initial != null) texts = initial;
		for (var i = 0; i < inputs.length; i++) {
			texts[i] = $(inputs[i]).val();
		}
		container.html('');
		for (i = 0; i < c; i++) {
			var value = i < texts.length ? texts[i] : i < loadedData.length ? loadedData[i] : '';
			container.append("<label><div>" + (i+1) + ".</div><input type='text' value='" + value + "' name='nt-" + (i+1) + "'></label");
		}
	};
	var count = $("input[name=count]");
	count.on('change', function(e) {
		if (count.val().length == 0) {
			count.val(total);
		} else {
			updateInputs(Number(count.val()), null);
		}
	});
	updateInputs(Number(count.val()), loadedData);
});