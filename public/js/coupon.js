$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Enter proper Name");

	$("#coupon_validate").validate({
		rules:
		{
			code:
			{
				required: true,
				noSpace: true
			},
			
			percent_off:
			{
				required: true,
				number: true  
			},
			NO_of_use:
			{
				required: true,
				number: true  
			}
		},
		message:
		{
			code:"Enter Proper Name",
			percent_off:
			{
				number: "Enter number only"
			},
			NO_of_use:
			{
				number: "Enter number only"  
			}
		},
	});
});