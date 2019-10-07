$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Enter proper Name");

	$("#banner_validate").validate({
		rules:
		{
			Name:
			{
				required: true,
				noSpace: true
			},
			Image:
			{
				required: true
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