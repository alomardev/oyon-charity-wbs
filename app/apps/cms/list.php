@@include("../../_top.php", {"type": "site", "title": "خارطة الموقع"})
@@include("../../_header.php", {"active": "login"})
<div class='page-wrapper' id='cms-list'>
@@include("_toolbar.php", {"active": "list"})
	<div class="top-inputs u-cf">
		<div class='u-fr'><label>البحث: <input type="text" placeholder="ابحث في العنواين أو المحتوى"></label></div>

		<div class='u-fl'><label>ترتيب: <select>
			<option value="">الأقدم</option>
			<option value="">الأحدث</option>
		</select></label></div>
		<div class='u-fl'><label>عرض: <select>
			<option value="">الكل</option>
			<option value="">المكتمل</option>
			<option value="">غير المكتمل</option>
		</select></label></div>
	</div>
	<hr>
	<div id="messages-list">
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
		<a href="#" class="list-item"><span class="subject">عنوان</span><span class="date">تاريخ</span><span class='icon icon-mention'></span></a>
	</div>
</div>
@@include("../../_footer.php")
@@include("../../_bottom.php", {"scripts": []})