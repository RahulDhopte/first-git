@extends('frontend_view.layout')

@section('content')
<div class="container">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Shopping Cart</li>
		</ol>
	</div>
	<div class="table-responsive cart_info">
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td style="padding-left: 80px;" class="image">Item</td>
					<td style="padding-left: 200px;" class="description">Name</td>
					<td class="price">Price</td>
					<td class="quantity">Quantity</td>
					<td class="total">Total</td>
					<td></td>
				</tr>
			</thead>

			<tbody>
				@foreach(Cart::content() as $row) 
				<tr >
					
					<td class="cart_product">
						<a href=""><img style="width: 150px;" src="upload_img/{{$row->options->img}}"></a>
					</td>
					<td style="width: 50%;" class="cart_description">
						<h4><a href="{{url('product_detail/'.$row->id)}}">{{$row->name}}</a></h4>
						<p>{{$row->rowId}}</p>
					</td>
					<td class="cart_price">
						<p id="price">{{$row->price}}</p>
					</td>
					<td style="width: 10%;" class="cart_quantity">
						<div class="cart_quantity_button">

							<input style="width: 50%" id="qty" data-id="{{$row->rowId}}" data-pro= "{{$row->id}}" class="cart_quantity_input" type="number" name="quantity" value="{{$row->qty}}" autocomplete="off" >

						</div>
					</td>
					<td class="cart_total">
						<p class="pro_total" class="cart_total_price">{{$row->total}}</p>
					</td>
					<td class="cart_delete">
						<a class="cart_quantity_delete" href="{{url('remove_item/'.$row->rowId)}}"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
@endsection

@section('second')
<div class="container">
	<div class="heading">
		<h3>What would you like to do next?</h3>
		<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
	</div>
	<form method="POST" action="discount_checkout">
		{{csrf_field()}}
	<div class="row">
		<div class="col-sm-6">
			<ul class="user_option">
				<li id="add_cup">
					<input id="coupon" type="checkbox">
					<label>Use Coupon Code</label>
				</li>

			</ul>

		</div> 
		<div class="col-sm-6">
			<div class="total_area">
				<ul class="add_coupon">
					<li>Cart Sub Total <span class="sub_total">{{Cart::subtotal()}}</span></li>
					<li>Cart Quantity <span class="count">{{Cart::count()}}</span></li>
					
					<li>Total <span class="total1">{{Cart::total()	}}</span></li>
					<input type="hidden" id="hid" name="hiden_discount" value="">
				</ul>
				<a style="margin-bottom: 10px;" class="btn btn-default update" href="{{url('index')}}">Continue Shopping</a>
				<button style="margin-bottom: 10px;" class="btn btn-default check_out">Check Out</button> 
			</div>
		</div>
	</form>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	
	$(document).ready(function () 
	{
		$(document.body).on('click','#send_coupon',coupon_value);
		coupon_value();
	});
	$(document).on('input', '#qty', function() {

		var $this = $(this);
		var id = $this.data('id');
		var pro = $this.data('pro');
		var qty = $this.val();

		if (qty < 1) {
			$.get('/remove_cartitem/'+id, function(response){
				if(response.success){
					$this.closest('tr').remove();
				}
			})
		}
		else{
			$.get('/update_cart/'+id+'/'+qty+'/'+pro, function(response){
				if(response.success){
					$this.closest('tr').find('.pro_total').text(response.pro);
					$('.sub_total').text(response.subtotal);
					$('.total1').text(response.total);
					$('.count').text(response.count);
					$('.tax').text(response.tax);
				}
				else
				{
					$('.modal1').text(response.message);
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
				}
			})
		}

	});
	$(document).on('click', '#coupon', function() {
		$('.coupon_val').remove();
		$('#add_cup').append('<div class="coupon_val"><br><input id="chk_coupon" type="text"><a class="btn btn-default" style="color: #FFFFFF;background: #FE980F;" id="send_coupon">Apply Coupon</a></div>');
	});

	function coupon_value()
        {
        	var cup = $('#chk_coupon').val();
        	if (cup) {
        		$.ajax({
                type: "POST",
                url: "{{'coupon_chk'}}",
                  data: {
                    "_token": "{{ csrf_token() }}",
                    "cup": cup,
                    
                },
                cache: false,
                success: function (response) {
                	$('#new').remove();
                	$('.add_coupon').append('<li id="new">Coupon<span class="">'+response.name+'</span></li>');
                	$('.add_coupon').append('<input name="cup_id" type="hidden" value="'+response.id+'">');
                	$('.total1').text(response.final);
                	$('#hid').val(response.final);
                	$('.modal1').text(response.message);
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
                }
});
        	}
        	
        }


		</script> 
		@endsection
