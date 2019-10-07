@extends('frontend_view.layout')

@section('content')
<form id="checkout_validate" method="POST" action="{{ url('final_chk') }}">
	{{csrf_field()}}
	<div class="container">

		<div class="shopper-informations">
			<div class="row">

				<div style="margin-left: 70px;" class="col-md-4 clearfix">
					<div class="bill-to">
						<p>Add Address</p>
						<div style="width: 70%;" class="form-one">

							{{csrf_field()}}
							<input class="address" type="text" name="address1"  placeholder="Address1*">
							<input class="address" type="text" name="address2" placeholder="Address2">
							<input class="address" type="text" name="city"  placeholder="City*">
							<input class="address" type="text" name="state"  placeholder="State*">
							<input class="address" type="text" name="country"  placeholder="Country*">
							<input class="address" type="text" name="zipcode"  placeholder="Zipcode*">
							<a style="margin-top: 15px;" id="add" class="btn btn-primary">
								{{ __('ADD') }}
							</a>

						</div>

					</div>
				</div>

				<div style="width: 20%;" class="col-md-4">
					<div class="order-message ">
						<p class="chk_ship">Billing Address</p>
						@foreach($data as $role)
						<label><input   value="{{ $role['id'] }}" name="bill_addr" class="billing" type="radio"> {{ $role['address_1'] }} <br>{{ $role['address_2'] }}</label>

						@endforeach
					</div>	
				</div>
				<div style="width: 20%;margin-left: 90px;" class="col-md-4">
					<div class="order-message ">
						<p class="chk_bill">Shipping Address</p>
						@foreach($data as $role)
						<label><input value="{{ $role['id'] }}"  name="ship_addr" class="shipping" type="radio"> {{ $role['address_1'] }} <br>{{ $role['address_2'] }}</label>

						@endforeach
					</div>	
				</div>					
			</div>
		</div>
		<div class="review-payment">
			<h2>Review & Payment</h2>
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

								<input readonly style="width: 50%" id="qty" data-id="{{$row->rowId}}" class="cart_quantity_input" type="number" name="quantity" value="{{$row->qty}}" autocomplete="off" >

							</div>
						</td>
						<td class="cart_total">
							<p class="pro_total" class="cart_total_price">{{$row->total}}</p>
						</td>
						
					</tr>
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
						<!-- <li>Eco Tax <span class="tax">{{Cart::tax()}}</span></li> -->
						<!-- <li>Shipping Cost <span class="Shipping">Rs:50</span></li> -->

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
		<div class="payment-options">
			@foreach($payment as $pay)
			<span>
				<label><input checked name="payment" value="{{$pay['id']}}" type="radio"> {{$pay['name']}}</label>
			</span>
			@endforeach
			<!-- <span>
				<label><input name="payment" value="Paypal" type="radio"> Paypal</label>
			</span> --><br>
			<button type="Submit" class="btn btn-default" style="background: #FE980F;border-radius: 0;color: #FFFFFF;margin-top: 18px;border: none;padding: 5px 15px;">Submit</button>
		</div>
	</div>
</form>
@endsection

@section('js')
<script type="text/javascript">
	$(document).on('input', '#qty', function() {

		var $this = $(this);
		var id = $this.data('id');
		var qty = $this.val();

		if (qty < 1) {
			$.get('/remove_cartitem/'+id, function(response){
				if(response.success){
					$this.closest('tr').remove();
				}
			})
		}
		else{
			$.get('/update_cart/'+id+'/'+qty, function(response){
				if(response.success){
					$this.closest('tr').find('.pro_total').text(response.pro);
					$('.sub_total').text(response.subtotal);
					$('.total1').text(response.total);
					$('.count').text(response.count);
					$('.tax').text(response.tax);
				}
				if (response.count>500) {
					$('.Shipping').text('0');
				}
			})
		}

	});

	$(document).on('click', '#add', function() {
		var address1 = $('[name=address1]').val();
		var address2 = $('[name=address2]').val();
		var city = $('[name=city]').val();
		var state = $('[name=state]').val();
		var country = $('[name=country]').val();
		var zipcode = $('[name=zipcode]').val();
		$.ajax({
			type: "POST",
			url: "{{'add_address'}}",
			data: {
				"_token": "{{ csrf_token() }}",
				"address1": address1,
				"address2": address2,
				"city": city,
				"state": state,
				"country": country,
				"zipcode": zipcode,
			},
			cache: false,
			success: function (response) {
				console.log(response.addr);
				$('.chk_ship').append('<label><input value="'+response.addr_id+'" class="billing" name="bill_addr" type="radio">'+response.addr+'</label>');
				$('.chk_bill').append('<label><input value="'+response.addr_id+'" class="billing" name="ship_addr" type="radio">'+response.addr+'</label>');
			}
		});
	});
</script> 
@endsection