var selected = null;

$(function() {
	$("#list-container .list-item").on('click', function() {
		$(this).siblings(".list-item").toggleClass("selected", false);
		$(this).toggleClass("selected", true);
		$(".empty-notation").css("display", "none");
		$(".non-empty").css("display", "block");
		showInfo($(this).data("fid"));
	});

	$("[name=query]").on("change keyup input paste", function() {
		var query = $(this).val();
		if (query.trim().length == 0) {
			$(".list-item").css("display", "block");
		} else {
			for (var i = 0; i < data.length; i++) {
				var b = data[i];
				if (b.gov_id !== query && b.file_id !== query && b.full_name.indexOf(query) == -1) {
					$("[data-fid$="+b.file_id+"]").css("display", "none");
				} else {
					$("[data-fid$="+b.file_id+"]").css("display", "block");
				}
			}
		}
	});
});

function showInfo(fid) {
	var b = findBen(fid);
	if (fid === "undefined" || fid == null || b == null) {
		// show none selected;
		return;
	}

	$("#item-info-fullname").html((b.full_name !== "undefined" && b.full_name != null && ("" + b.full_name).length > 0) ? b.full_name : "---");
	$("#item-info-fileid").html((b.file_id !== "undefined" && b.file_id != null && ("" + b.file_id).length > 0) ? "#"+b.file_id : "---");
	$("#item-info-govid").html((b.gov_id !== "undefined" && b.gov_id != null && ("" + b.gov_id).length > 0) ? b.gov_id : "---");
	$("#item-info-gender").html((b.gender !== "undefined" && b.gender != null && ("" + b.gender).length > 0) ? b.gender : "---");
	$("#item-info-birthdate").html((b.birth_date !== "undefined" && b.birth_date != null && ("" + b.birth_date).length > 0) ? b.birth_date : "---");
	$("#item-info-mcount").html((b.family_members_count !== "undefined" && b.family_members_count != null && ("" + b.family_members_count).length > 0) ? b.family_members_count : "---");
	if (b.deps != null) {
		$("#item-info-dcount").html(b.deps.length);
	}
	if (b.phones != null) {
		$("#item-info-phone1").html((b.phones.phone_1 !== "undefined" && b.phones.phone_1 != null && ("" + b.phones.phone_1.length) > 0) ? b.phones.phone_1 : "---");
		$("#item-info-phone2").html((b.phones.phone_2 !== "undefined" && b.phones.phone_2 != null && ("" + b.phones.phone_2.length) > 0) ? b.phones.phone_2 : "---");
		$("#item-info-phone3").html((b.phones.phone_3 !== "undefined" && b.phones.phone_3 != null && ("" + b.phones.phone_3.length) > 0) ? b.phones.phone_3 : "---");
	}
	$("#edit-button").attr("href", (b.file_id !== "undefined" && b.file_id != null && ("" + b.file_id).length > 0) ? "edit.php?fid="+b.file_id : "");
}

function findBen(fid) {
	for (var i = 0; i < data.length; i++) {
		var b = data[i];
		if (b.file_id == fid) {
			return b;
		}
	}
	return null;
}