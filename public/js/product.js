$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
		if ( value.trim().length != 0){ 
			return true ;
		} 
		else{
			return false;
		};
	});
	$.validator.addMethod("category", function(value, element) { 
		if ( value != 'category'){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Select category");
	$.validator.addMethod("product", function(value, element) { 
		if ( value != 'product'){ 
			return true ;
		} 
		else{
			return false;
		};
	},"Select product");

	$("#product_validate").validate({
		rules:
		{
			Name:
			{
				required: true,
				noSpace: true
			},
			sku:
			{
				required: true,
				noSpace: true
			},
			short_description:
			{
				required: true,
				noSpace: true
			},
			long_description:
			{
				required: true,
				noSpace: true
			},
			price:
			{
				required: true,
				number:true
			},
			Image:
			{
				required: true
			},
			status:
			{
				required: true
			},
			quantity:
			{
				required: true,
				number:true
			},
			Category:
			{
				category:true
			},
			Pro_attr:
			{
				product:true
			}
		},
		message:
		{
			
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