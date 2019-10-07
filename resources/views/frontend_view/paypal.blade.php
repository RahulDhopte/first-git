   @extends('frontend_view.layout')

   @section('content')
   <form action="{{ url('paypal_chk') }}"
   	method="post" target="_top">
   	{{ csrf_field() }}
   <div id="payment-box">
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

								<input style="width: 50%" id="qty" data-id="{{$row->rowId}}" class="cart_quantity_input" type="text" readonly name="quantity" value="{{$row->qty}}" autocomplete="off" >

							</div>
						</td>
						<td class="cart_total">
							<p class="pro_total" class="cart_total_price">{{$row->total}}</p>
						</td>
						
					</tr>
   					<input type='hidden'name='item_number[]' value='{{$row->rowId}}'>
   					
					@endforeach

				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-sm-6">


			</div> 
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span class="sub_total">{{Cart::subtotal()}}</span></li>
						<li>Cart Quantity <span class="count">{{Cart::count()}}</span></li>
						
						<input type="hidden"  name="bill_id" value="{{$bill_id}}">
						<input type="hidden"  name="ship_id" value="{{$ship_id}}">
						<?php if(!empty($discount)) { ?>
							<li>Total <span class="total1">{{$discount}}</span></li>
							<input type="hidden" id="hid" name="hiden_discount" value="{{$discount}}">
							<input type="hidden" name="cup_id" value="{{$cup_id}}">
						<?php } else{?>

							<li>Total <span class="total1">{{Cart::total()}}</span></li>
						<?php }?>
					</ul>

				</div>
			</div>
		</div>
   	
   	<input type='hidden' name='business'value='jaydip.malaviya-facilitator@wwindia.com'>
   	<input type='hidden'name='notify_url'value='http://sitename/paypal-payment-gateway-integration-in-php/notify.php'>
   	<input type='hidden' name='cancel_return'value='http://sitename/paypal-payment-gateway-integration-in-php/cancel.php'>
   	<input type='hidden' name='return'value='http://sitename/paypal-payment-gateway-integration-in-php/return.php'>
   	<input type="hidden" name="cmd" value="_xclick"> 
   	<input type="submit" class="btn btn-default" style="background: #FE980F;border-radius: 0;color: #FFFFFF;margin-bottom:18px;margin-left: 60px; border: none;padding: 5px 15px;" name="pay_now" id="pay_now"Value="Pay Now">
   </form>
</div>
@endsection
