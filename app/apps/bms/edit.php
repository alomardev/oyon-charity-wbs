0@@include("../../_header.php", {"title": "قائمة المستفيدين", "active": "news-app"})

<?php

?>

<div class='page-wrapper' id='bms-edit'>
@@include("_toolbar.php", {"active": "edit"})
<form action="" method='post'>
<table class='one-line-inputs' id='person-info-table'><tbody>
		<tr>
			<td class='width-content'><label for="person_full_name">الاسم:</label></td>
			<td class='width-fill' colspan="3"><input name="person_full_name" type="text"></td>
			<td class='width-content'><label for="person_gov_id">رقم الحاسب:</label></td>
			<td class='width-fill'><bdo dir="ltr"><input name="person_gov_id" type="text" input-prop-digits></bdo></td>
		</tr>
		<tr>
			<td class='width-content'><label for="person_gender">الجنس:</label></td>
			<td class='width-2'>
				<select name="person_gender">
					<option value="m">ذكر</option>
					<option value="f">أنثى</option>
				</select>
			</td>
			<td class='width-content' ><label for='person_area_id'>الحي:</label></td>
			<td class='width-fill'>
				<select name="person_area_id">
					<option value="1">واحد</option>
					<option value="2">اثنين</option>
					<option value="3">ثلاثة</option>
					<option value="4">أربعة</option>
				</select>
			</td>
			<td class='width-content'><label>تاريخ الميلاد:</label></td>
			<td class='width-content'>
				<div class="date-inputs">
					<bdo dir="ltr"><input type="text" name='person_birth_date_year' placeholder="سنة"> 
					<input type="number" input-prop-digits name='person_birth_date_month' placeholder="شهر"> 
					<input type="number" input-prop-digits name='person_birth_date_day' placeholder="يوم"></bdo>
				</div>
			</td>
		</tr>
</tbody></table>
<hr>
<table class='two-lines-inputs'><tbody>
	<tr>
		<td class='width-fill'><label for="b_social_status_id">الحالة الاجتماعية</label></td>
		<td class='width-fill'><label for="b_family_members_count">الأفراد</label></td>
		<td class='width-fill'><label for="b_health_status_id">الحالة الصحية</label></td>
		<td class='width-fill'><label for="b_type">نوع المستفيد</label></td>
		<td><label for="b_period">نوع المساعدة</label></td>
	</tr>
	<tr>
		<td class='width-fill'>
			<select name="b_social_status_id">
				<option value="">فارغ</option>
				<option value="">فارغ</option>
				<option value="">فارغ</option>
			</select>
		</td>
		<td class='width-2'><bdo dir="ltr"><input type="number" input-prop-digits name='b_family_members_count'></bdo></td>
		<td class='width-fill'>
			<select name="b_health_status_id">
				<option value="">فارغ</option>
				<option value="">فارغ</option>
				<option value="">فارغ</option>
			</select>
		</td>
		<td class='width-fill'>
			<select name="b_type">
				<option value="">فارغ</option>
				<option value="">فارغ</option>
				<option value="">فارغ</option>
			</select>
		</td>
		<td class='width-fill'>
			<select name="b_period">
				<option value="">bla bla bla</option>
				<option value="">bla bla bla</option>
				<option value="">bla bla bla</option>
			</select>
		</td>
	</tr>
</tbody></table>
<hr>
<table class='two-lines-inputs'><tbody>
	<tr>
		<td class='width-content'><label>تاريخ تحديث البيانات</label></td>
		<td class='width-fill'><label for="b_accom_type_id">السكن</label></td>
		<td class='width-2'><label for="b_rent_value">مقدار الإيجار</label></td>
		<td class='width-3'><label for="b_giving_amount">مقدار المساعدة</label></td>
		<td class='width-content'><label>تاريخ بداية الصرف</label></td>
	</tr>
	<tr>
		<td class='width-content'>
			<div class="date-inputs">
				<bdo dir="ltr"><input type="text" name='b_payment_date_year' placeholder="سنة"> 
				<input type="number" input-prop-digits name='b_payment_date_month' placeholder="شهر"> 
				<input type="number" input-prop-digits name='b_payment_date_day' placeholder="يوم"></bdo>
			</div>
		</td>
		<td class='width-fill'>
			<select name="b_accom_type_id">
				<option value="">تجربة</option>
				<option value="">تجربة</option>
				<option value="">تجربة</option>
			</select>
		</td>
		<td class='width-2'><bdo dir="ltr"><input name='b_rent_value' type="number" input-prop-digits></bdo></td>
		<td class='width-3'><bdo dir="ltr"><input name='b_giving_amount' type="number" input-prop-digits></bdo></td>
		<td class='width-content'>
			<div class="date-inputs">
				<bdo dir="ltr"><input type="text" name='b_update_date_year' placeholder="سنة"> 
				<input type="number" input-prop-digits name='b_update_date_month' placeholder="شهر"> 
				<input type="number" input-prop-digits name='b_update_date_day' placeholder="يوم"></bdo>
			</div>
		</td>
	</tr>
</tbody></table>
<hr>
<table class='one-line-inputs'><tbody>
	<tr>
		<td class='width-content'><label for="b_job">المهنة: </label></td>
		<td class='width-fill'><input name='b_job' type="text"></td>
		<td class='width-content'><label for="b_jobـlocation">مقرها: </label></td>
		<td class='width-fill'><input name='b_jobـlocation' type="text"></td>
	</tr>
</tbody></table>
<hr>
<table class='two-lines-inputs'><tbody>
	<tr>
		<td class='width-fill'><label>هاتف المنزل</label></td>
		<td class='width-fill'><label>الجوال</label></td>
		<td class='width-fill'><label>هاتف آخر</label></td>
	</tr>
	<tr>
		<td class='width-fill'><bdo dir='ltr'><input name="b_phone_home" type="text"></bdo></td>
		<td class='width-fill'><bdo dir='ltr'><input name="b_phone_mobile" type="text"></bdo></td>
		<td class='width-fill'><bdo dir='ltr'><input name="b_phone_other" type="text"></bdo></td>
	</tr>
</tbody></table>
<hr>
<table class='two-lines-inputs'><tbody>
	<tr>
		<td class='width-content sep-left' rowspan="2">مصادر الدخل</td>
		<td class='width-fill sep-left-pad'><label>واحد</label></td>
		<td class='width-fill'><label>اثنين</label></td>
		<td class='width-fill'><label>ثلاثة</label></td>
		<td class='width-fill'><label>أربعة</label></td>
		<td class='width-fill'><label>خمسة</label></td>
		<td class='width-fill'><label>ستة</label></td>
		<td class='width-fill'><label>سبعة ثمانية</label></td>
		<td class='width-fill'><label>المجموع</label></td>
	</tr>
	<tr>
		<td class='width-fill sep-left-pad'><bdo dir="ltr"><input type="number" input-prop-digits></bdo></td>
		<td class='width-fill'><bdo dir="ltr"><input type="number" input-prop-digits></bdo></td>
		<td class='width-fill'><bdo dir="ltr"><input type="number" input-prop-digits></bdo></td>
		<td class='width-fill'><bdo dir="ltr"><input type="number" input-prop-digits></bdo></td>
		<td class='width-fill'><bdo dir="ltr"><input type="number" input-prop-digits></bdo></td>
		<td class='width-fill'><bdo dir="ltr"><input type="number" input-prop-digits></bdo></td>
		<td class='width-fill'><bdo dir="ltr"><input type="number" input-prop-digits></bdo></td>
		<td class='width-fill'><bdo dir="ltr"><input type="number" input-prop-digits readonly></bdo></td>
	</tr>
</tbody></table>
<hr>
<h4 class='center'>التابعين</h4>
<table id='dep-table'><tbody>
	<tr>
		<td class='width-2 center'><label>رقم الحاسب</label></td>
		<td class='width-fill center'><label>الاسم</label></td>
		<td class='width-1-5 center'><label>الجنس</label></td>
		<td class='width-1-5 center'><label>صلة القرابة</label></td>
		<td class='width-content center'><label>تاريخ الميلاد</label></td>
		<td class='width-2-5 center'><label>المرحلة الدراسية</label></td>
	</tr>
	<tr>
		<td class='width-2'><bdo dir="ltr"><input type="text"></bdo></td>
		<td class='width-fill'><input type="text"></td>
		<td class='width-1-5'>
			<select>
				<option value="m">ذكر</option>
				<option value="f">أنثى</option>
			</select>
		</td>
		<td class='width-1-5'>
			<select>
				<option value="">بنت</option>
				<option value="">ابن</option>
				<option value="">زوجة</option>
			</select>
		</td>
		<td class='width-content'>
			<div class="date-inputs">
				<bdo dir="ltr"><input type="text" name='b_update_date_year' placeholder="سنة"> 
				<input type="number" input-prop-digits name='b_update_date_month' placeholder="شهر"> 
				<input type="number" input-prop-digits name='b_update_date_day' placeholder="يوم"></bdo>
			</div>
		</td>
		<td class='width-2-5'>
			<select class='error'>
				<option value="">بنت</option>
				<option value="">ابن</option>
				<option value="">زوجة</option>
			</select>
		</td>
	</tr>
</tbody></table>
<hr>
<div class="actions-container u-cf">
	<div id='message' class="u-fr"></div>
	<button class='u-fl' name='preview'>حفظ ومعاينة</button>
	<button class='u-fl' name='save'>حفظ</button>
	<button class='u-fl danger' name='delete'>حذف</button>
</div>
</form>
</div>
@@include("../../_footer.php", {"scripts": []})