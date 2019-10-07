$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Enter proper Name");

	$.validator.addMethod("emailchk", function(value,element) {
		if (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(value)){
			return true;
		}
		else{
			return false;
		};
	},"Enter proper email");

	$("#profile_validate").validate({
		rules:
		{
			username:
			{
				required: true,
				noSpace: true
			},
			
			firstname:
			{
				required: true,
				noSpace: true
			},
			lastname:
			{
				required: true,
				noSpace: true
			},
			email:
			{
				emailchk: true,
				required: true
			},
			
		},
		message:
		{
			
		},
	});
});