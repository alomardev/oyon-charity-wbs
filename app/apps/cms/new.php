@@include("../../_top.php", {"type": "site", "title": "خارطة الموقع"})
@@include("../../_header.php", {"active": "login"})
<div class='page-wrapper' id='cms-new'>
@@include("_toolbar.php", {"active": "new"})
	<form>
		<div class="top-inputs u-cf">
			<label class='u-fr'>العنوان: <input name='subject' type="text"></label>
			<label class='u-fr'>الرقم: <input size='5' name='number' type='text'></label>
			<label class='u-fl'>التاريخ: <input size='10' name='date' type='text' readonly value="2017-07-26"></label>
		</div>
		<hr>
		<div class='middle-inputs'>
			<div class='committees-info'>
				<div class='committee-number-container u-cf'>
					<label class='u-fr'>عدد ماحل التوجيه:</label>
					<select class='u-fl' name="comnum">
						<option value="1">مرحلة</option>
						<option value="2">مرحلتان</option>
						<option value="3">3 مراحل</option>
						<option value="4">4 مراحل</option>
						<option value="5">5 مراحل</option>
					</select>
				</div>
				<div class="workflow-container">
					<div class="workflow-item">
						<label>١.</label>
						<select name="wi1">
							<option value="1">one</option>
							<option value="2">two</option>
							<option value="3">three</option>
						</select>
					</div>
					<div class="workflow-item">
						<label>٢.</label>
						<select name="wi1">
							<option value="1">one</option>
							<option value="2">two</option>
							<option value="3">three</option>
						</select>
					</div>
					<div class="workflow-item">
						<label>٣.</label>
						<select name="wi1">
							<option value="1">one</option>
							<option value="2">two</option>
							<option value="3">three</option>
						</select>
					</div>
				</div>
			</div>
			<textarea name="message"></textarea>
		</div>
		<hr>
		<div class="u-cf">
			<button class='u-fl'>إنشاء الخطاب</button>
		</div>
	</form>
</div>
@@include("../../_footer.php")
@@include("../../_bottom.php", {"scripts": []})