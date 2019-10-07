$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Enter proper Name");

	$("#attribute_validate").validate({
		rules:
		{
			Name:
			{
				required: true,
				noSpace: true
			},
			
			value:
			{
				required: true,
				noSpace: true
			}
		},
		message:
		{
			Name:"Enter Proper Name",
			value:"Enter Proper Value"
		},
	});
});