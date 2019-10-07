$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Enter proper Name");

	$("#config_validate").validate({
		rules:
		{
			Config_key:
			{
				required: true,
				noSpace: true
			},
			Config_value:
			{
				required: true,
				noSpace: true
			},
			
			gender:
			{
				required: true
			}
		},
		message:
		{
			Config_key:
			{
				required: "Enter Proper Config_key"
			},
			Config_value:
			{
				required:  "Enter your Config_value"
			},
			
			gender:"Select Status"
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