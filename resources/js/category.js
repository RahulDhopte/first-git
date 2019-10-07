$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	});

	$("#cat_validate").validate({
		rules:
		{
			Name:
			{
				required: true,
				noSpace: true
			},
			
			status:
			{
				required: true
			}
		},
		message:
		{
			Name:"Enter Proper Name",
			status:"Select Status"
		},
	});
});