---
title: "Bootstrap Wizard With jQuery Validation"
date: 2013-04-01 00:32:31
---

Twitter Bootstrap Wizard supports jQuery Validation plugin by default, an example was added to demonstrate a simple case when a form needs to be validated in two different steps.

Example Code:

<pre>
$(document).ready(function() {
  	var $validator = $("#commentForm").validate({
		  rules: {
		    emailfield: {
		      required: true,
		      email: true,
		      minlength: 3
		    },
		    namefield: {
		      required: true,
		      minlength: 3
		    },
		    urlfield: {
		      required: true,
		      minlength: 3,
		      url: true
		    }
		  }
		});
 
	  	$('#rootwizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  			var $valid = $("#commentForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
	  		}
	  	});
});
</pre>
