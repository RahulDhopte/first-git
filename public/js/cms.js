$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"No Space");

	$("#cms_validate").validate({
		rules:
		{
			title:
			{
				required: true,
				noSpace: true
			},
			content:
			{
				required: true,
				noSpace: true
			}
		},
		message:
		{
			title:
			{
				required: "Enter Proper Title"
			},
			content:
			{
				required:  "Enter your Content"
			}
			
			
		},
		
	});
});