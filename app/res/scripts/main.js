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
	/* clock */
	if (exists('clock')) {
		var today = new Date();
		var days = ["السبت", "الأحد", "الأثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة"];
		var startTime = function () {
			today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			var ampm = 'صباحًا';
			if (h >= 12) {
				ampm = 'مساءً';
				h -= 12;
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