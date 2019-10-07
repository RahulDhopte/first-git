$(document).ready(function () {
	$("#checkout_validate").validate({
		rules:
		{	
			bill_addr:
			{
				required: true
			},
			ship_addr:
			{
				required: true
			}
		},
		message:
		{	
			
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