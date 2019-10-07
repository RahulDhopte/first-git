$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Enter proper Name");

	$("#pay_validate").validate({
		rules:
		{
			name:
			{
				required: true,
				noSpace: true
			}	
		},
		message:
		{
			name:
			{
				required: "Enter Proper Name"
			}
		},
	});
});