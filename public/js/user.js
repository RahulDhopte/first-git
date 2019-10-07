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

	$.validator.addMethod("pwcheck", function(value,element) {
		if (/^[A-Za-z0-9\d=!\-@._*]*$/.test(value)){
			return true;
		}
		else{
			return false;
		};
	},"enter proper password");

	$("#user_validate").validate({
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
			password: 
			{
				pwcheck: true,
				required: true,
				minlength: 6,
				maxlength: 8
			},
			status:
			{
				required: true
			}
		},
		message:
		{
			username:
			{
				required: "Enter Proper Name"
			},
			firstname:
			{
				required:  "Enter your firstname"
			},
			lastname:
			{
				required:  "Enter your lastname"
			},
			password:
			{
				required: "Enter your password"
			},
			status:"Select Status"
		},
		errorPlacement: function(error, element) {
           if (element.attr("type") == 'radio') {
                 error.appendTo(element.parent());
            }
              else {
                error.insertAfter(element);

            }
        },
	});
});