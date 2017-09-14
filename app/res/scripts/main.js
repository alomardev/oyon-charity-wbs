/* support IE */
if (!String.prototype.startsWith) {
  String.prototype.startsWith = function(searchString, position) {
    position = position || 0;
    return this.indexOf(searchString, position) === position;
  };
}

var ibans_data = {
	"al-rajhi": {
		"title": "مصرف الراجحي",
		"iban": "SA 2880 0004 6560 8010 0388 65",
		"color": "#142C8E"
	},
	"al-ahli": {
		"title": "البنك الأهلي التجاري",
		"iban": "SA 6510 0000 0572 1669 0001 07",
		"color": "#269C31"
	},
	"samba": {
		"title": "مجموعة سامبا المالية",
		"iban": "SA 2440 0000 0000 0406 9067 26",
		"color": "#1D588B"
	},
	"al-riyadh": {
		"title": "بنك الرياض",
		"iban": "SA 6820 0000 0324 0025 9999 01",
		"color": "#289387"
	},
	"al-inma": {
		"title": "مصرف الإنماء",
		"iban": "SA 8405 0000 6820 1149 1510 00",
		"color": "#6C4B35"
	}
};
$(function() {

	/* inputs */
	setupTextAutocomplete();
	setupValidator();

	/* news ticker */
	if (exists('news-ticker-container')) {

		var tickersContainer = $("#news-ticker-container");
		var tickers = tickersContainer.find("div");

		tickersContainer.css("overflow-x", "hidden");
		tickersContainer.css("white-space", "nowrap");
		tickersContainer.css("position", "relative");
		tickersContainer.css("box-sizing", "content-box");
		tickersContainer.css("height", tickers.outerHeight() + "px");

		tickers.css("position", "absolute");
		tickers.css("display", "block");

		var sequence = [];
		for (var i = 0; i < tickers.length; i++) {
			sequence[i] = $(tickers[i]);

			if (i == 0) {
				sequence[i].startOffset = -sequence[i].outerWidth();
			} else {
				sequence[i].startOffset = sequence[i-1].startOffset - sequence[i].outerWidth();
			}
		}

		var speed = 1.5; // ppf
		var sv =  tickersContainer.outerWidth() / 2;
		var lp = sequence[sequence.length-1];
		var slide = function() {
			
			sv+=speed;
			
			for (var i = 0; i < sequence.length; i++) {
				var newoffset = (sequence[i].startOffset + sv);
				sequence[i].css("left", newoffset + "px");
				if (newoffset > tickersContainer.outerWidth()) {
					sequence[i].startOffset = lp.startOffset-sequence[i].outerWidth();
					lp = sequence[i];
					if (sequence.length == 1 || lp.startOffset + sv > 0) {
						lp.startOffset = -sv - lp.outerWidth();
					}
				}
			}
		};

		setInterval(function() {
			slide();
		}, 1000 / 33);
	}
	/* clock */
	if (exists('clock')) {
		var today = new Date();
		var days = ["الأحد", "الأثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"];
		var startTime = function () {
			today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			var ampm = 'صباحًا';
			if (h >= 12) {
				ampm = 'مساءً';
				h -= 12;
			} else if (h == 0) {
				h = 12;
			}
			m = m < 10 ? "0" + m : m;
			s = s < 10 ? "0" + s : s;
			$('#clock .digital').html(h + ":" + m + ":" + s + " " + ampm);
		};
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!

		var yyyy = today.getFullYear();
		if(dd<10){
		    dd='0'+dd;
		} 
		if(mm<10){
		    mm='0'+mm;
		} 
		$('#clock .date').html(days[today.getDay()] + "، " + '<bdo dir="ltr">'+yyyy+'-'+mm+'-'+dd+"</bdo>م");

		startTime();

		setInterval(startTime, 500);
	}
	/* slide show */
	if (exists('slide-show')) {
		var ipointer = 0;
		var images = ['banner1.jpg', 'banner2.jpg'];
		$('.slide-show-next-btn').on('click', function() {
			changeImage(1);
		});
		$('.slide-show-prev-btn').on('click', function() {
			changeImage(-1);
		});
		var changeImage = function(increment) {
			ipointer += increment;
			if (ipointer > images.length - 1) {
				ipointer = 0;
			}
			if (ipointer < 0) {
				ipointer = images.length - 1;
			}
			$('.slide-show-image').css('background-image', "url(/res/" + images[ipointer] + ")");
		};
		var interval = setInterval(function() {changeImage(1);}, 4000);
	}
	/* services */
	if (exists("services")) {
		var s = $("#services > .services-row > div");
		var services = [
		"توزيع الزكاة",
		"مساعدات سداد إيجار",
		"كفالة أيتام وأسر",
		"كسوة الصيف والشتاء",
		"مساعدات رمضانية",
		"تحسين المساكن",
		"تدريب وتأهيل",
		"مساعدات أسر السجناء",
		"الوقف الخيري",
		"سداد الكهرباء",
		"روضة الأطفال",
		"مساعدات زواج",
		"السلة الغذائية",
		"سقيا الماء",
		"مساعدات طلابية",
		"فرحة مولود"
		];
		var ds = $('#services > .services-row > div');
		var offset = 0;
		var max = ds.length;
		setInterval(function () {
			offset += max;
			if (offset > services.length - 1) {
				offset = 0;
			}
			ds.animate({opacity: 0}, 500, "linear", function () {
				for (var i = 0; i < max; i++) {
					$(ds[i]).html(services[offset + i]);
				}
			});
			ds.animate({opacity: 1}, 500).delay(1000);
		}, 4000);
	}

	/* ibans button */
	if (exists("card-ibans")) {
		var ibansBox = $('#card-ibans .content-box');
		var rows = "";
		for (var i in ibans_data) {
			rows += "<tr style='background-color: " + ibans_data[i].color + ";'><td>" + ibans_data[i].title + "</td><td>" + ibans_data[i].iban + "</td></tr>";
		}
		ibansBox.html("<table><tbody>" + rows + "</tbody></table>");
	}

	/* orgchart */
	if (exists("orgchart")) {
		var orgchart = $('#orgchart');
		google.charts.load('current', {packages:["orgchart"]});
    google.charts.setOnLoadCallback(function () {
      var data1 = new google.visualization.DataTable();
      var data2 = new google.visualization.DataTable();
      var data3 = new google.visualization.DataTable();
      data1.addColumn('string', 'Name');
      data1.addColumn('string', 'Manager');
      data1.addColumn('string', 'ToolTip');
      data2.addColumn('string', 'Name');
      data2.addColumn('string', 'Manager');
      data2.addColumn('string', 'ToolTip');
      data3.addColumn('string', 'Name');
      data3.addColumn('string', 'Manager');
      data3.addColumn('string', 'ToolTip');

      // For each orgchart box, provide the name, manager, and tooltip to show.
      data1.addRows([
        [{f: 'الرئيس', v: 'a'}, '', 'الأستاذ خالد الحسين'],
	      ['أمين الصندوق', 'a', 'الأستاذ منصور جمعة العساف'],
	      ['الأمين العام', 'a', 'الأستاذ إبراهيم بن حمود الكليب'],
	      ['نائب الرئيس', 'a', 'الأستاذ صالح بن أحمد الماضي'],
	      ['المدير التنفيذي', 'a', 'الأستاذ ناصر بن خالد السبيعي']
      ]);
      data2.addRows([
	      [{f: '<a href="/committees.php">اللجان العاملة</a>', v: 'b'}, '', ''],
	      ['<a href="/committees.php?c=7">الروضة</a>', 'b', 'الأستاذ صالح بن أحمد الماضي'],
	      ['<a href="/committees.php?c=5">المشاريع والتطوير</a>', 'b', 'الأستاذ فالح بن سعود العمر'],
	      ['<a href="/committees.php?c=4">العلاقات العامة والإعلام</a>', 'b', 'الأستاذ فهد بن سعد العساف'],
	      ['<a href="/committees.php?c=1">الإدارة المالية</a>', 'b', 'الأستاذ منصور جمعة العساف'],
	      ['<a href="/committees.php?c=6">الأيتام والأسر</a>', 'b', 'الأستاذ إبراهيم بن حمود الكليب'],
	      [{f: '<a href="/committees.php?c=2">اللجنة الاجتماعية</a>', v: 'c'}, 'b', 'الأستاذ أحمد بن عيسى الشاهين'],
	      ['<a href="/committees.php?c=3">اللجنة النسائية</a>', 'c', 'الأستاذ أحمد بن عيسى الشاهين']
      ]);
      data3.addRows([
	      [{f: 'القوى العاملة', v: 'd'}, '', ''],
	      ['المستخدمون', 'd', ''],
	      ['موظفو وموظفات الروضة', 'd', ''],
	      ['مدخل بيانات', 'd', ''],
	      ['المحاسب', 'd', ''],
	      ['المحصل', 'd', ''],
	      ['الباحث الاجتماعي', 'd', ''],
      ]);

      var chart1 = new google.visualization.OrgChart(orgchart.find('#chart1')[0]);
      var chart2 = new google.visualization.OrgChart(orgchart.find('#chart2')[0]);
      var chart3 = new google.visualization.OrgChart(orgchart.find('#chart3')[0]);

      chart1.draw(data1, {onmouseover: function() {
      	console.log(this);
      }});
      chart2.draw(data2, {allowHtml: true});
      chart3.draw(data3);
    });
	}

	/* committees highlighting */
	if (exists("committees") && window.location.hash) {
		var header = $(window.location.hash + ", " + window.location.hash + " + p");
		if (header.length > 0) {
			header.addClass('highlight-committee');
		}
	}
});

function exists(id) {
	return document.getElementById(id) !== null;
}

function setupTextAutocomplete() {
	var tacs = $("[data-role=tac] > input");
	var tacs_list_items = tacs.parent().find("li");

	tacs_list_items.on('click', function() {
		$(this).parent("ul").siblings("input").val($(this).text());
	});

	var radius = tacs_list_items.parent("ul").css("border-radius");
	var border = $(tacs_list_items[0]).css("border-bottom");

	tacs.keyup(function() {
		var items = $(this).parent().find("li");
		items.css("border-bottom", border).css("border-radius", "0px");
		var count = 0;
		var firstChildIndex = 0;
		var lastChildIndex = 0;
		for (var i = 0; i < items.length; i++) {
			var e = $(items[i]);

			if (e.text().indexOf($(this).val()) > -1) {
				e.css("display", "block");
				count++;
				if (count == 1) {
					firstChildIndex = i;
				}
				lastChildIndex = i;
			} else {
				e.css("display", "none");
			}
		}
		if (count > 0) {
			var fe = $(items[firstChildIndex]);
			fe.css("border-top-left-radius", radius)
			.css("border-top-right-radius", radius);

			var le = $(items[lastChildIndex]);
			le.css("border-bottom", "none")
			.css("border-bottom-left-radius", radius)
			.css("border-bottom-right-radius", radius);
		}
		if (count == 0) {
			$(this).siblings("ul").css("display", "none");
		} else {
			$(this).siblings("ul").css("display", "block");
		}
	});

	tacs.focus(function() {
		var input = $(this);
		var list = input.siblings("ul");
		list.css("z-index", "20000");
		list.css("display", "block");
		list.outerWidth(input.outerWidth());
	});
	
	tacs.blur(function() {
		var list = $(this).siblings("ul");
		list.fadeOut(200,function() {
			list.find("li").css("display", "block")
			.css("border-bottom", border).css("border-radius", "0px");
			list.find("li:first-child").css("border-top-left-radius", radius)
			.css("border-top-right-radius", radius);
			list.find("li:last-child").css("border-bottom-left-radius", radius)
			.css("border-bottom-right-radius", radius)
			.css("border-bottom", "none");
			list.css("display", "none");
			list.css("z-index", "auto");
		});
	});
}

function setupValidator() {
	var showTooltip = function(input, message, timeout) {
		hideTooltip(input);
		var dom = $("<div tooltip-source='" + input.attr("name") + "' class='tooltip error'>" + message + "</div>");
		var tri = $("<div tooltip-source='" + input.attr("name") + "' class='tooltip-tri error'></div>");
		$("body").append(dom);
		$("body").append(tri);
		dom.css("position", "absolute");
		dom.css("top", (input.offset().top + input.outerHeight() + 6) + "px");
		dom.css("left", ((input.offset().left) + input.outerWidth() / 2 - dom.outerWidth() / 2) + "px");
		tri.css("position", "absolute");
		tri.css("top", (input.offset().top + input.outerHeight()) + "px");
		tri.css("left", (input.offset().left + input.outerWidth() / 2 - 5) + "px");
	};

	var hideTooltip = function(input) {
		var tooltip = $("[tooltip-source=" + input.attr("name") + "]");
		tooltip.remove();
	};

	$("*[input-prop-minlength]").each(function() {
		var e = $(this);
		e.bind("propertychange change click keyup input paste", function() {
			e.toggleClass("error", e.val().length < Number(e.attr("input-prop-minlength")));
		});
	});

	$("*[input-prop-digits]").each(function() {
		var e = $(this);
		e.bind("propertychange change click keyup input paste", function() {
			var regex = /^\d*$/;
			e.toggleClass("error", !regex.test(e.val()));
		});
	});

	$("[input-prop-phone]").each(function() {
		var e = $(this);
		e.bind("propertychange change click keyup input paste", function() {
			var regex = /(^$|^(05|\+9665|009665)\d{8}$)/;
			e.toggleClass("error", !regex.test(e.val()));
		});
		if (e.attr("input-prop-phone-message") !== "undefined" && e.attr("name") !== "undefined") {
			e.blur(function() {
				if ($(this).hasClass("error")) {
					showTooltip($(this), $(this).attr("input-prop-phone-message"), 2000);
				} else {
					hideTooltip($(this));
				}
			});
		} 
	});

	$("*[input-prop-email]").each(function() {
		var e = $(this);
		e.bind("propertychange change click keyup input paste", function() {
			var regex = /(^$|^\S+@\S+\.\S+$)/;
			e.toggleClass("error", !regex.test(e.val()));
		});
	});
}