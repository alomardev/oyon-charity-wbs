var depItemTemplate;
var depsContainer;

$(function() {
	depsContainer = $("#dep-table > tbody");
	depItemTemplate = depsContainer.find("tr:last-child").clone();

	if (initialData != null) {
		fillInputs(initialData);
	}
	setupDepGenerator();

	$("input[name^=b_income]").on('change keyup input paste', function() {
		var total = 0;
		$("input[name^=b_income]").each(function() {
			total += Number($(this).val());
		});
		$("#total_income").val(total);
	});

	var form = $("#bform");
	
	form.on("keypress", function(e) {
		return e.keyCode != 13;
	});


	form.on("keyup change input", "[input-prop-required]", function() {
		$(this).toggleClass('error', $(this).val().trim().length == 0);
	});

	form.submit(function(e) {
		e.preventDefault();
	});

	$("button[name=newform]").on('click', function() {
		if (!saved) {
			alert("يجب حفظ المعلومات الحالية أولا.");
			return;
		}
		$("input,select").val("");
		depsContainer.html("");
		depsContainer.append(depItemTemplate.clone());
	});

	$("button[name=delete]").on('click', function() {
		if (!confirm("هل أنت متأكد من الحذف؟")) {
			return;
		}
		showLoading();
		$.ajax({
			url: "/phps/bms-editor-delete.php",
			type: "POST",
			data: "fid="+$("input[name=fid]").val(),

			success: function(data) {
				console.log(data);
				if (!data.error) {
					window.location="/apps/bms/list.php";
				} else {
					message("حدث خطأ ما!", true);
				}
			},
			error: function(xhr, status, error) {
				message("لم تتم العملية! عاود المحاولة.");
				$("#loading").css("display", "none");
			}
		});
	});

	var saved = true;
	$("input").on("change keyup input paste", function() {
		saved = false;
		console.log(saved);
	});

	$("button[name=save]").on('click', function() {
		var norequired = true;
		$("[input-prop-required]").each(function() {
			var filled = $(this).val().trim().length > 0;
			if (!filled && !$(this).attr("name").startsWith("d_XX")) {
				norequired = false;
				$(this).toggleClass('error', true);
			}
		});

		if ($("input.error,select.error").length > 0) {
			message("يرجى التدقيق في المدخلات" + (!norequired ? " وملء البيانات الإجبارية المعلمة بالنجمة (*)" : ""), true);
			return;
		}
		
		$("#message").html("");

		showLoading();
		$.ajax({
			url: "/phps/bms-editor-save.php",
			type: "POST",
			data: form.serialize(),
			success: function(data) {
				if (data.error) {
					message((data.error_message !== "undefined") ? data.error_message : "حدث خطأ ما! يرجى التدقيق في صحة المعلومات.", true);
				} else {
					saved = true;
					fillInputs(data.message.data);
					if (data.message.data !== "undefined" && data.message.data != null) {
						message("تم حفظ معلومات المستفيد برقم الملف " + data.message.data.file_id, false);
						setTimeout(function() {$("#message").html("");}, 8000);
						window.history.pushState("", "", '/apps/bms/edit.php?fid='+data.message.data.file_id);
					}
				}
				hideLoading();
			},
			error: function(xhr, status, error) {
				message("لم تتم العملية! عاود المحاولة.");
				$("#loading").css("display", "none");
			}
		});
	});

	$("#loading").css("display", "none");
});

function setupDepGenerator() {
	var nindex = 1000;
	var reactivateRemove = function() {
		depsContainer.find(".icon-new").toggleClass("icon-new", false).toggleClass("icon-remove", true);
	};
	var generateId = function(row) {
		nindex++;
		row.find("[name]").each(function() {
			var e = $(this);
			e.attr("name", e.attr("name").replace("XX", nindex));
		});
	};

	depsContainer.on('change keyup input paste', 'tr:last-child input[name]', function() {
		if ($(this).val().length == 0) {
			return;
		}
		reactivateRemove();
		depsContainer.append(depItemTemplate.clone());

		generateId($(this).closest("tr"));
	});

	depsContainer.on('click', 'tr td:first-child .icon-remove', function() {
		$(this).closest("tr").remove();
	});
}

function insertDep(dep) {
	var newItem = depItemTemplate.clone();
	depsContainer.append(newItem);

	newItem.find("[name=d_XX_govid]").val(dep.gov_id == null ? "" : dep.gov_id);
	newItem.find("[name=d_XX_name]").val(dep.full_name == null ? "" : dep.full_name);
	newItem.find("[name=d_XX_gender]").val(dep.gender == null ? "" : dep.gender);
	newItem.find("[name=d_XX_relation]").val(dep.relation_id == null ? "" : dep.relation_id);

	if (dep.birth_date != null) {
		datesplit = dep.birth_date.split('-');
		newItem.find("[name=d_XX_bdyear]").val(datesplit[0]);
		newItem.find("[name=d_XX_bdmonth]").val(datesplit[1]);
		newItem.find("[name=d_XX_bdday]").val(datesplit[2]);
	}

	newItem.find(".icon-new").toggleClass("icon-new", false).toggleClass("icon-remove", true);
	newItem.find("[name]").each(function() {
		var e = $(this);
		e.attr("name", e.attr("name").replace("XX", dep.id));
	});
}

function message(message, error) {
	$("#message").toggleClass("error-text", error);
	$("#message").html(message);
}

function showLoading() {
	$("#loading").css("display", "block");
}
function hideLoading() {
	$("#loading").fadeOut(500, function() {
		$(this).css("display", "none");
	});
}

function fillInputs(data) {
	console.log(data);
	if (data != null) {
		$("[name=fid]").val(data.file_id != null ? data.file_id : "");
		$("[name=person_full_name]").val(data.full_name != null ? data.full_name : "");
		$("[name=person_gov_id]").val(data.gov_id != null ? data.gov_id : "");
		$("[name=b_file_number]").val(data.file_id != null ? data.file_id : "");
		$("[name=person_gender]").val(data.gender != null ? data.gender : "");
		$("[name=b_area_id]").val(data.area_id != null ? data.area_id : "");
		$("[name=b_social_status_id]").val(data.social_status_id != null ? data.social_status_id : "");
		$("[name=b_family_members_count]").val(data.family_members_count != null ? data.family_members_count : "");
		$("[name=b_health_status_id]").val(data.health_status_id != null ? data.health_status_id : "");
		$("[name=b_type]").val(data.beneficiary_type_id != null ? data.beneficiary_type_id : "");
		$("[name=b_permanent]").val((data.is_permanent != null && !data.is_permanent) ? 1 : 0);
		$("[name=b_accom_type_id]").val(data.accom_type_id != null ? data.accom_type_id : "");
		$("[name=b_rent_value]").val(data.rent_value != null ? data.rent_value : "");
		$("[name=b_giving_amount]").val(data.giving_amount != null ? data.giving_amount : "");
		$("[name=b_job]").val(data.job != null ? data.job : "");
		$("[name=b_job_location]").val(data.job_location != null ? data.job_location : "");
		$("[name=b_alternative_contact_name]").val(data.alternative_contact_name != null ? data.alternative_contact_name : "");
		
		var datesplit;
		if (data.birth_date != null) {
			datesplit = data.birth_date.split('-');
			$("[name=person_birth_date_year]").val(datesplit[0]);
			$("[name=person_birth_date_month]").val(datesplit[1]);
			$("[name=person_birth_date_day]").val(datesplit[2]);
		}
		if (data.payment_date != null) {
			datesplit = data.payment_date.split('-');
			$("[name=b_payment_date_year]").val(datesplit[0]);
			$("[name=b_payment_date_month]").val(datesplit[1]);
			$("[name=b_payment_date_day]").val(datesplit[2]);
		}
		if (data.update_date != null) {
			datesplit = data.update_date.split('-');
			$("[name=b_update_date_year]").val(datesplit[0]);
			$("[name=b_update_date_month]").val(datesplit[1]);
			$("[name=b_update_date_day]").val(datesplit[2]);
		}
		if (data.phones != null) {
			$("[name=b_phone_home]").val(data.phones.phone_1 !== "undefined" ? data.phones.phone_1 : "");
			$("[name=b_phone_mobile]").val(data.phones.phone_2 !== "undefined" ? data.phones.phone_2 : "");
			$("[name=b_phone_other]").val(data.phones.phone_3 !== "undefined" ? data.phones.phone_3 : "");
		}
		if (data.incomes != null) {
			$("[name^=b_income]").each(function() {
				var labelId = $(this).attr("name").split("_")[2];
				$(this).val(data.incomes["_"+labelId] !== "undefined" ? data.incomes["_"+labelId] : "");
			});
		}
		depsContainer.html("");
		if (data.deps != null) {
			for (var i = 0; i < data.deps.length; i++) {
				insertDep(data.deps[i]);
			}
		}
		depsContainer.append(depItemTemplate.clone());
	}
}