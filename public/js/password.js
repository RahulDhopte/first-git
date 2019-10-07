$(document).ready(function () {
	

	$.validator.addMethod("pwcheck", function(value,element) {
		if (/^[A-Za-z0-9\d=!\-@._*]*$/.test(value)){
			return true;
		}
		else{
			return false;
		};
	},"enter proper password");

	$("#password_validate").validate({
		rules:
		{
			
			password: 
			{
				pwcheck: true,
				required: true,
				minlength: 6,
				maxlength: 8
			}
			
		},
		message:
		{
			
			password:
			{
				required: "Enter your password"
			}
			
		},
		
	});
});