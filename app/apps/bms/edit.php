@@include("../../_header.php", {"title": "قائمة المستفيدين", "active": "news-app"})

<?php
$fid = isset($_GET['fid']) ? $_GET['fid'] : 0;

/*
$educational_levels = mysqli_fetch_all(select("SELECT `level` as `value`, `label` as `label` FROM `educational_level`;"), MYSQL_ASSOC);
$beneficiary_types = mysqli_fetch_all(select("SELECT `id` as `value`, `label` as `label` FROM `beneficiary_type`;"), MYSQL_ASSOC);
$accom_types = mysqli_fetch_all(select("SELECT `id` as `value`, `label` as `label` FROM `accom_type`;"), MYSQL_ASSOC);
$relation_labels = mysqli_fetch_all(select("SELECT `id` as `value`, `label` as `label` FROM `relation_label`;"), MYSQL_ASSOC);
$health_status_labels = mysqli_fetch_all(select("SELECT `id` as `value`, `label` as `label` FROM `health_status_label`;"), MYSQL_ASSOC);
$social_status_labels = mysqli_fetch_all(select("SELECT `id` as `value`, `label` as `label` FROM `social_status_label`;"), MYSQL_ASSOC);
$area_labels = mysqli_fetch_all(select("SELECT `id` as `value`, `label` as `label` FROM `area_label`;"), MYSQL_ASSOC);
$schools = mysqli_fetch_all(select("SELECT `id` as `value`, `label` as `label` FROM `school`;"), MYSQL_ASSOC);
$income_labels = mysqli_fetch_all(select("SELECT * FROM `income_label`;"), MYSQL_ASSOC);
*/

$educational_levels = array();	
$result = select("SELECT `level` as `value`, `label` as `label` FROM `educational_level`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$educational_levels[] = $row;
	}
}
$beneficiary_types = array();	
$result = select("SELECT `id` as `value`, `label` as `label` FROM `beneficiary_type`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$beneficiary_types[] = $row;
	}
}
$accom_types = array();	
$result = select("SELECT `id` as `value`, `label` as `label` FROM `accom_type`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$accom_types[] = $row;
	}
}
$relation_labels = array();	
$result = select("SELECT `id` as `value`, `label` as `label` FROM `relation_label`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$relation_labels[] = $row;
	}
}
$health_status_labels = array();	
$result = select("SELECT `id` as `value`, `label` as `label` FROM `health_status_label`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$health_status_labels[] = $row;
	}
}
$social_status_labels = array();	
$result = select("SELECT `id` as `value`, `label` as `label` FROM `social_status_label`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$social_status_labels[] = $row;
	}
}
$area_labels = array();	
$result = select("SELECT `id` as `value`, `label` as `label` FROM `area_label`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$area_labels[] = $row;
	}
}
$schools = array();	
$result = select("SELECT `id` as `value`, `label` as `label` FROM `school`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$schools[] = $row;
	}
}
$income_labels = array();	
$result = select("SELECT * FROM `income_label`;");
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$income_labels[] = $row;
	}
}

function echoOptions($arr, $empty_value = true) {
	if ($empty_value)	echo "<option selected disable value style='display: none;'></option>";
	for ($i = 0; $i < count($arr); $i++) {
		echo "<option value='{$arr[$i]['value']}'>{$arr[$i]['label']}</option>";
	}
}


$initial_data = "null";
if ($fid > 0) {
	$initial_data = getBeneficiary($fid);
	if (!$initial_data) {
		$initial_data = "null";
	} else {
		$initial_data = json_encode($initial_data);
	}
}
echo "<script>var initialData = $initial_data;</script>";
?>

<div class='page-wrapper' id='bms-edit'>
@@include("_toolbar.php", {"active": "edit"})
<div id="loading">
	<div class="loading-medium dark"></div>
</div>
<form id='bform' action="" method='post'>
<input type="hidden" name='fid' value='<?php echo $fid; ?>'>
<table class='one-line-inputs' id='person-info-table'><tbody>
		<tr>
			<td class='width-content'><label class="required-notation" for="person_full_name">الاسم</label></td>
			<td class='width-fill' colspan="5" ><input name='person_full_name' type='text' input-prop-required></td>
			<td class='width-content'><label class="required-notation" for="person_gov_id">رقم الحاسب</label></td>
			<td class='width-fill'><bdo dir="ltr"><input name='person_gov_id' type='text' input-prop-digits input-prop-required></bdo></td>
		</tr>
		<tr>
			<td class='width-content'><label class="required-notation" for="b_file_number">الملف</label></td>
			<td class='width-1-5'><bdo dir='ltr'><input name='b_file_number' type='text' input-prop-digits input-prop-required></bdo></td>
			<td class='width-content'><label for="person_gender">الجنس</label></td>
			<td class='width-1-5'>
				<select name='person_gender'>
					<option selected disable value style='display: none;'></option>
					<option value="0">ذكر</option>
					<option value="1">أنثى</option>
				</select>
			</td>
			<td class='width-content' ><label for='person_area_id'>الحي</label></td>
			<td class='width-fill'>
				<select name='b_area_id'>
					<?php echoOptions($area_labels); ?>
				</select>
			</td>
			<td class='width-content'><label>تاريخ الميلاد</label></td>
			<td class='width-content'>
				<div class="date-inputs">
					<bdo dir="ltr"><input date-role='date-year' name='person_birth_date_year' type='number' placeholder='سنة'> 
					<input date-role='date-month' name='person_birth_date_month' type='number' placeholder='شهر'> 
					<input date-role='date-day' name='person_birth_date_day' type='number' placeholder='يوم'></bdo>
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
			<select name='b_social_status_id'>
				<?php echoOptions($social_status_labels); ?>
			</select>
		</td>
		<td class='width-2'><bdo dir="ltr"><input name='b_family_members_count' type='number' min='0'></bdo></td>
		<td class='width-fill'>
			<select name='b_health_status_id'>
				<?php echoOptions($health_status_labels); ?>
			</select>
		</td>
		<td class='width-fill'>
			<select name='b_type'>
				<?php echoOptions($beneficiary_types); ?>
			</select>
		</td>
		<td class='width-fill'>
			<select name='b_permanent'>
				<option value="0">مساعدة مؤقتة</option>
				<option value="1">مساعدة دائمة</option>
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
				<bdo dir="ltr"><input date-role='date-year' name='b_payment_date_year' type='number' min='1817' max='2018' placeholder='سنة'> 
				<input date-role='date-month' name='b_payment_date_month' type='number' min='1' max='12' placeholder='شهر'> 
				<input date-role='date-day' name='b_payment_date_day' type='number' min='1' max='31' placeholder='يوم'></bdo>
			</div>
		</td>
		<td class='width-fill'>
			<select name='b_accom_type_id'>
				<?php echoOptions($accom_types); ?>
			</select>
		</td>
		<td class='width-2'><bdo dir="ltr"><input name='b_rent_value' type='number' min='0'></bdo></td>
		<td class='width-3'><bdo dir="ltr"><div data-role='tac'><input name='b_giving_amount' type="text" input-prop-digits><ul><li>500</li><li>800</li><li>900</li></ul></div></bdo></td>
		<td class='width-content'>
			<div class="date-inputs">
				<bdo dir="ltr"><input date-role='date-year' name='b_update_date_year' type='number' min='1817' max='2018' placeholder='سنة'> 
				<input date-role='date-month' name='b_update_date_month' type='number' min='1' max='12' placeholder='شهر'> 
				<input date-role='date-day' name='b_update_date_day' type='number' min='1' max='31' placeholder='يوم'></bdo>
			</div>
		</td>
	</tr>
</tbody></table>
<hr>
<table class='one-line-inputs'><tbody>
	<tr>
		<td class='width-content'><label for="b_job">المهنة: </label></td>
		<td class='width-fill'><input name='b_job' type='text'></td>
		<td class='width-content'><label for="b_jobـlocation">مقرها: </label></td>
		<td class='width-fill'><input name='b_job_location' type='text'></td>
	</tr>
</tbody></table>
<hr>
<table class='two-lines-inputs'><tbody>
	<tr>
		<td class='width-fill'><label>هاتف المنزل</label></td>
		<td class='width-fill'><label class='required-notation'>الجوال</label></td>
		<td class='width-fill'><label>هاتف آخر</label></td>
		<td class='width-fill'><label>اسم قريب</label></td>
	</tr>
	<tr>
		<td class='width-fill'><bdo dir='ltr'><input name='b_phone_home' input-prop-phone type='text'></bdo></td>
		<td class='width-fill'><bdo dir='ltr'><input name='b_phone_mobile' input-prop-phone type='text' input-prop-required></bdo></td>
		<td class='width-fill'><bdo dir='ltr'><input name='b_phone_other' input-prop-phone type='text'></bdo></td>
		<td class='width-fill'><input name='b_alternative_contact_name' type='text'></td>
	</tr>
</tbody></table>
<hr>
<table class='two-lines-inputs'><tbody>
	<tr>
		<td class='width-content sep-left' rowspan="2">مصادر الدخل</td>
		<?php
		for ($i=0; $i < count($income_labels); $i++) { 
			echo "<td class='width-fill".($i==0?" sep-left-pad":"")."'><label>&nbsp;&nbsp;{$income_labels[$i]['label']}&nbsp;&nbsp;</label></td>";
		}
		?>
		<td class="width-fill"><label>المجموع</label></td>
	</tr>
	<tr>
		<?php
		for ($i=0; $i < count($income_labels); $i++) { 
			echo "<td class='width-fill".($i==0?" sep-left-pad":"")."'><bdo dir='ltr'><input name='b_income_{$income_labels[$i]['id']}' min='0' type='number'></bdo></td>";
		}
		?>
		<td class='width-fill'><bdo dir="ltr"><input id='total_income' type='number' readonly></bdo></td>
	</tr>
</tbody></table>
<hr>
<h4 class='u-cf center'>التابعين
</h4>
<table id='dep-table'><tbody>
	<tr>
		<td class='width-content'></td>
		<td class='width-2 center'><label>رقم الحاسب</label></td>
		<td class='width-fill center'><label>الاسم</label></td>
		<td class='width-1-5 center'><label>الجنس</label></td>
		<td class='width-1-5 center'><label>صلة القرابة</label></td>
		<td class='width-content center'><label>تاريخ الميلاد</label></td>
		<td class='width-2-5 center'><label>المرحلة الدراسية</label></td>
	</tr>
	<tr>
		<td class='width-content' valign="middle"><div class="icon-new"></div></td>
		<td class='width-2'><bdo dir="ltr"><input name='d_XX_govid' type='text' input-prop-digits input-prop-required></bdo></td>
		<td class='width-fill'><input name='d_XX_name' type='text' input-prop-required></td>
		<td class='width-1-5'>
			<select name='d_XX_gender'>
				<option selected disable value style='display: none;'></option>
				<option value="0">ذكر</option>
				<option value="1">أنثى</option>
			</select>
		</td>
		<td class='width-1-5'>
			<select name='d_XX_relation' input-prop-required>
				<?php echoOptions($relation_labels); ?>
			</select>
		</td>
		<td class='width-content'>
			<div class="date-inputs">
				<bdo dir="ltr"><input date-role='date-year' name='d_XX_bdyear' type='number' min='1817' max='2018' placeholder='سنة'> 
				<input date-role='date-month' name='d_XX_bdmonth' type='number' min='1' max='12' placeholder='شهر'> 
				<input date-role='date-day' name='d_XX_bdday' type='number' min='1' max='31' placeholder='يوم'></bdo>
			</div>
		</td>
		<td class='width-2-5'>
			<select name='d_XX_edulevel'>
				<?php echoOptions($educational_levels); ?>
			</select>
		</td>
	</tr>
</tbody></table>
<hr>
<div class="actions-container u-cf">
	<div id='message' class="u-fr"></div>
	<button class='u-fl' name='save'>حفظ</button>
	<button class='button u-fl danger' name='delete'>حذف</button>
	<div class='sep-l u-fl'><button class='button' name='newform'>استمارة جديدة</button></div>
</div>
</form>
</div>
@@include("../../_footer.php", {"scripts": ["/res/bms-edit.js"]})