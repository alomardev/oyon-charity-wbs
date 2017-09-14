$(function() {
	setupDepGenerator();
});

function setupDepGenerator() {
	var container = $("#dep-table > tbody");
	var newTemplate = container.find("tr.new-row").clone();
	var toggler;

	var reactivateDeleteButtons = function() {};


	var activateToggler = function() {
		toggler = container.find("tr.new-row input[name$=govid]");
		toggler.bind("change keyup input paste", gen);
	};

	var gen = function() {
		if (toggler.val().length > 0) {
			toggler.parentsUntil("tr")
			toggler.unbind("change keyup input paste", gen);
			container.append(newTemplate.clone());
			activateToggler();
			reactivateDeleteButtons();
		}
	};
	
	activateToggler();

	// when gov id input in last row is filled,
	// add new tempalte
}