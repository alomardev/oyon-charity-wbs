<?php
require_once "app.php";
// 0 means insert new
$fid = isset($_POST['fid']) ? $_POST['fid'] : 0;

// date segments
$birth_date_year = isset($_POST['person_birth_date_year']) ? trim($_POST['person_birth_date_year']) : '';
$birth_date_month = isset($_POST['person_birth_date_month']) ? trim($_POST['person_birth_date_month']) : '';
$birth_date_day = isset($_POST['person_birth_date_day']) ? trim($_POST['person_birth_date_day']) : '';
$payment_date_year = isset($_POST['b_payment_date_year']) ? trim($_POST['b_payment_date_year']) : '';
$payment_date_month = isset($_POST['b_payment_date_month']) ? trim($_POST['b_payment_date_month']) : '';
$payment_date_day = isset($_POST['b_payment_date_day']) ? trim($_POST['b_payment_date_day']) : '';
$update_date_year = isset($_POST['b_update_date_year']) ? trim($_POST['b_update_date_year']) : '';
$update_date_month = isset($_POST['b_update_date_month']) ? trim($_POST['b_update_date_month']) : '';
$update_date_day = isset($_POST['b_update_date_day']) ? trim($_POST['b_update_date_day']) : '';

// beneficiary table values
$gov_id = (isset($_POST['person_gov_id']) and !empty(trim($_POST['person_gov_id']))) ? "'".$_POST['person_gov_id']."'" : 'NULL';
$full_name = (isset($_POST['person_full_name']) and !empty(trim($_POST['person_full_name']))) ? "'".$_POST['person_full_name']."'" : 'NULL';
$gender = (isset($_POST['person_gender']) and !empty(trim($_POST['person_gender']))) ? $_POST['person_gender'] : 'NULL';
$birth_date = formatQueryDate($birth_date_year, $birth_date_month, $birth_date_day);
$file_id = (isset($_POST['b_file_number']) and !empty(trim($_POST['b_file_number']))) ? $_POST['b_file_number'] : 'NULL';
$area_id = (isset($_POST['b_area_id']) and !empty(trim($_POST['b_area_id']))) ? $_POST['b_area_id'] : 'NULL';
$social_status_id = (isset($_POST['b_social_status_id']) and !empty(trim($_POST['b_social_status_id']))) ? $_POST['b_social_status_id'] : 'NULL';
$family_members_count = (isset($_POST['b_family_members_count']) and !empty(trim($_POST['b_family_members_count']))) ? $_POST['b_family_members_count'] : 'NULL';
$health_status_id = (isset($_POST['b_health_status_id']) and !empty(trim($_POST['b_health_status_id']))) ? $_POST['b_health_status_id'] : 'NULL';
$type = (isset($_POST['b_type']) and !empty(trim($_POST['b_type']))) ? $_POST['b_type'] : 'NULL';
$permanent = (isset($_POST['b_permanent']) and !empty(trim($_POST['b_permanent']))) ? $_POST['b_permanent'] : 'NULL';
$accom_type_id = (isset($_POST['b_accom_type_id']) and !empty(trim($_POST['b_accom_type_id']))) ? $_POST['b_accom_type_id'] : 'NULL';
$rent_value = (isset($_POST['b_rent_value']) and !empty(trim($_POST['b_rent_value']))) ? $_POST['b_rent_value'] : 'NULL';
$giving_amount = (isset($_POST['b_giving_amount']) and !empty(trim($_POST['b_giving_amount']))) ? $_POST['b_giving_amount'] : 'NULL';
$job = (isset($_POST['b_job']) and !empty(trim($_POST['b_job']))) ? "'".$_POST['b_job']."'" : 'NULL';
$job_location = (isset($_POST['b_job_location']) and !empty(trim($_POST['b_job_location']))) ? "'".$_POST['b_job_location']."'" : 'NULL';
$alternative_contact_name = (isset($_POST['b_alternative_contact_name']) and !empty(trim($_POST['b_alternative_contact_name']))) ? "'".$_POST['b_alternative_contact_name']."'" : 'NULL';
$payment_date = formatQueryDate($payment_date_year, $payment_date_month, $payment_date_day);
$update_date = formatQueryDate($update_date_year, $update_date_month, $update_date_day);

// phone table values
// home = 1, mobile = 2, other = 3
$phone_home = (isset($_POST['b_phone_home']) and !empty(trim($_POST['b_phone_home']))) ? "'".$_POST['b_phone_home']."'" : 'NULL';
$phone_mobile = (isset($_POST['b_phone_mobile']) and !empty(trim($_POST['b_phone_mobile']))) ? "'".$_POST['b_phone_mobile']."'" : 'NULL';
$phone_other = (isset($_POST['b_phone_other']) and !empty(trim($_POST['b_phone_other']))) ? "'".$_POST['b_phone_other']."'" : 'NULL';

// incomes and deps values
$incomes = array();
$deps = array();

foreach ($_POST as $k => $v) {
	if (substr($k, 0, 9) === "b_income_") {
		$income_id = substr($k, 9);
		if (empty(trim($v))) {
			continue;
		}
		$incomes[$income_id] = $v;
		continue;
	}
	if (substr($k, 0, 2) === "d_") {
		$segs = explode("_", $k);
		$dep_id = $segs[1];
		if ($dep_id === 'XX') {
			continue;
		}
		$deps[$dep_id][$segs[2]] = $v;
	}
}

/* beneficiary */
$query_ben = "";
if ($fid == 0) {
	$query_ben = "INSERT INTO `beneficiary` SET
	`file_id`=$file_id,
	`gov_id`=$gov_id,
	`full_name`=$full_name,
	`gender`=$gender,
	`birth_date`=$birth_date,
	`is_permanent`=$permanent,
	`job`=$job,
	`job_location`=$job_location,
	`update_date`=$update_date,
	`payment_date`=$payment_date,
	`giving_amount`=$giving_amount,
	`rent_value`=$rent_value,
	`family_members_count`=$family_members_count,
	`alternative_contact_name`=$alternative_contact_name,
	`beneficiary_type_id`=$type,
	`area_id`=$area_id,
	`accom_type_id`=$accom_type_id,
	`health_status_id`=$health_status_id,
 	`social_status_id`=$social_status_id;";
} else {
	$query_ben = "UPDATE `beneficiary` SET
	`file_id`=$file_id,
	`gov_id`=$gov_id,
	`full_name`=$full_name,
	`gender`=$gender,
	`birth_date`=$birth_date,
	`is_permanent`=$permanent,
	`job`=$job,
	`job_location`=$job_location,
	`update_date`=$update_date,
	`payment_date`=$payment_date,
	`giving_amount`=$giving_amount,
	`rent_value`=$rent_value,
	`family_members_count`=$family_members_count,
	`alternative_contact_name`=$alternative_contact_name,
	`beneficiary_type_id`=$type,
	`area_id`=$area_id,
	`accom_type_id`=$accom_type_id,
	`health_status_id`=$health_status_id,
 	`social_status_id`=$social_status_id
 	WHERE `file_id`=$fid;";
}

/* phone */
$query_remove_phone = "DELETE FROM `phone` WHERE `file_id`=$fid;";
$query_insert_phone = "";
if ($phone_home !== 'NULL') {
	if (empty($query_insert_phone)) {
		$query_insert_phone = "INSERT INTO `phone` (`file_id`, `index`, `phone_number`) VALUES ($file_id, 1, $phone_home)";
	} else {
		$query_insert_phone .= ", ($file_id, 1, $phone_home)";
	}
}
if ($phone_mobile !== 'NULL') {
	if (empty($query_insert_phone)) {
		$query_insert_phone = "INSERT INTO `phone` (`file_id`, `index`, `phone_number`) VALUES ($file_id, 2, $phone_mobile)";
	} else {
		$query_insert_phone .= ", ($file_id, 2, $phone_mobile)";
	}
}
if ($phone_other !== 'NULL') {
	if (empty($query_insert_phone)) {
		$query_insert_phone = "INSERT INTO `phone` (`file_id`, `index`, `phone_number`) VALUES ($file_id, 3, $phone_other)";
	} else {
		$query_insert_phone .= ", ($file_id, 3, $phone_other)";
	}
}
$query_insert_phone .= ";";

/* incomes */
$query_remove_incomes = "DELETE FROM `income` WHERE `file_id`=$fid;";
$query_insert_incomes = "INSERT INTO `income` (`file_id`, `label_id`, `amount`) VALUES";
$first = true;
foreach ($incomes as $k => $v) {
	if (!$first) {
		$query_insert_incomes .= ",";
	}
	$query_insert_incomes .= " ($file_id, $k, $v)";
	$first = false;
}
$query_insert_incomes .= ";";

/* deps */
$query_remove_deps = "DELETE FROM `dependency` WHERE `file_id`=$fid;";
$query_insert_deps = "INSERT INTO `dependency` (`id`, `file_id`, `educational_level`, `relation_id`, `gov_id`, `full_name`, `gender`, `birth_date`) VALUES";
$first = true;
$allow_deps_insertion = false;
$deps_pointer = 1;
foreach ($deps as $k => $v) {
	$edulevel = empty(trim($v['edulevel'])) ? 'NULL' : $v['edulevel'];
	$relation = empty(trim($v['relation'])) ? 'NULL' : $v['relation'];
	$govid = empty(trim($v['govid'])) ? 'NULL' : "'$v[govid]'";
	$name = empty(trim($v['name'])) ? 'NULL' : "'$v[name]'";
	$gender = empty(trim($v['gender'])) ? 'NULL' : $v['gender'];
	$birth_date = formatQueryDate($v['bdyear'], $v['bdmonth'], $v['bdday']);
	if ($govid === 'NULL' or $name === 'NULL' or $relation === 'NULL') {
		continue;
	}

	if (!$first) {
		$query_insert_deps .= ",";
	}

	$allow_deps_insertion = true;
	$query_insert_deps .= " ($deps_pointer, $file_id, $edulevel, $relation, $govid, $name, $gender, $birth_date)";
	$deps_pointer++;
	$first = false;
}
$query_insert_deps .= ";";

/* executing */
$error = false;
$result = array();
$new_fid = false;

$duplicate_file_id = mysqli_num_rows(select("SELECT `file_id` FROM `beneficiary` WHERE `file_id`=$file_id;")) > 0;
$duplicate_gov_id = mysqli_num_rows(select("SELECT `gov_id` FROM `beneficiary` WHERE `gov_id`=$gov_id;")) > 0;

$debug = array();
if ($fid == 0) {
	if ($duplicate_file_id) {
		$error = true;
		$result["error_message"] = "رقم الملف مستخدم لمستفيد آخر!";
	} elseif ($duplicate_gov_id) {
		$error = true;
		$result["error_message"] = "رقم الحاسب مستخدم لمستفيد آخر!";
	}
}

if (!$error and $gov_id !== 'NULL' and $file_id !== 'NULL') {
	if (!select($query_ben)) {
		$error = true;
		$debug[] = mysqli_error($link);
	}
  if (!select($query_remove_phone)) {
  	$error = true;
  	$debug[] = mysqli_error($link);
  }
  if ($phone_home !== 'NULL' or $phone_mobile !== 'NULL' or $phone_other !== 'NULL') {
  	if (!select($query_insert_phone)) {
  		$error = true;
  		$debug[] = mysqli_error($link);
  	}
  }
  if (!select($query_remove_incomes)) {
  	$error = true;
  	$debug[] = mysqli_error($link);
  }

  if (count($incomes) > 0) {
  	if (!select($query_insert_incomes)) {
  		$error = true;
  		$debug[] = mysqli_error($link);
  	}
  }
  if (!select($query_remove_deps)) {
  	$error = true;
  	$debug[] = mysqli_error($link);
  	$debug[] = $query_remove_deps;
  }
  if ($allow_deps_insertion) {
  	if (!select($query_insert_deps)) {
  		$error = true;
  		$debug[] = mysqli_error($link);
  		$debug[] = $query_insert_deps;
  	}
  }
}

if (!$error) {
	$result["data"] = getBeneficiary($file_id);
}

$result["debug"] = $debug;

$message = $result;

echo feedback($message, $error);
?>
