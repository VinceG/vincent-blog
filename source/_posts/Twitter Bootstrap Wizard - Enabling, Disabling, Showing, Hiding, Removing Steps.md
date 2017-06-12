---
title: "Twitter Bootstrap Wizard - Enabling, Disabling, Showing, Hiding, Removing Steps"
date: 2013-03-31 23:36:36
---

Latest Twitter bootstrap version adds five new methods. You can now do the following:

&nbsp;

<code>
// Disable step
$('#disable-step').on('click', function() {
	$('#rootwizard').bootstrapWizard('disable', $('#stepid').val());
});
// Enable step
$('#enable-step').on('click', function() {
	$('#rootwizard').bootstrapWizard('enable', $('#stepid').val());
});
// Remove step
$('#remove-step').on('click', function() {
	$('#rootwizard').bootstrapWizard('remove', $('#stepid').val(), true);
});
// Show step
$('#show-step').on('click', function() {
	$('#rootwizard').bootstrapWizard('display', $('#stepid').val());
});
// Hide step
$('#hide-step').on('click', function() {
	$('#rootwizard').bootstrapWizard('hide', $('#stepid').val());
});
</code>
