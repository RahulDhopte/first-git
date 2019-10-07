@extends('frontend_view.layout')

@section('content')

<?php 
if (empty($data[0]->id)) {

?>

<h3 align="center">No Item Added To Wishlist</h3>
<?php 
}
?>
<table style="margin-left: 70px; width: 90%;padding: 0;border: 1px solid #E6E4DF;" class="table table-condensed">
					<thead>
						<tr style="background: #FE980F;color: #fff;font-size: 16px;" class="cart_menu">
							<td style="padding-left: 50px;">Item</td>
							<td>Description</td>
							<td>Price</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $row)
							
						    <tr>
							<td style="margin: 0;padding: 0;vertical-align: inherit;" >
								<a style="margin-left: 30px;"><img style="width: 70px" src='upload_img/{{$row->img}}'></a>
							</td> 
							<td style="margin: 0;padding: 0;vertical-align: inherit;">
								<p>{{$row->pro_description}}</p>
							</td>							
							<td style="margin: 0;padding: 0;vertical-align: inherit;">
								<p>{{$row->price}}</p>
							</td>
							<td><a href="#" data-cart-id="{{$row->proid}}"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></td>
							<td class="cart_delete">
								<a href="{{url('remove_wish/'.$row->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr> 
						@endforeach
						
					
					</tbody>
				</table>
				<a style="margin-left: 70px;margin-bottom: 10px;" class="btn btn-default update" href="{{url('index')}}">Continue Shopping</a>
				@endsection
				@section('js')
		<script type="text/javascript">
			$(document).on('click', '.add-to-cart', function(e) {
			
				e.preventDefault();
				console.log('clicked')
			var $this = $(this);
			var id = $this.data('cart-id');
			$.get('/add_cart/'+id, function(response){
				if(response.success){
					// alert('success');
					//console.log(response.message)
					$('.modal1').text(response.message);
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);

				}
			})
		});
	</script>
	@endsection