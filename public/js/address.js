$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Enter proper Name");

	$("#address_validate").validate({
		rules:
		{
			address1:
			{
				required: true,
				noSpace: true
			},
			
			city:
			{
				required: true,
				noSpace: true
			},
			state:
			{
				required: true,
				noSpace: true
			},
			country:
			{
				required: true,
				noSpace: true
			},
			zipcode:
			{
				required: true,
				number:true
			},
		},
		message:
		{
			
		},
	});
});