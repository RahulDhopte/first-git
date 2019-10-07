@extends('frontend_view.layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left-sidebar">
				<h2>Category</h2>
				<div class="panel-group category-products" id="accordian"> 

					@foreach($cat as $row)


					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$row['id']}}">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								{{$row['Name']}}
							</a>
						</h4>
					</div> 
					<div id="sportswear{{$row['id']}}" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								@foreach($data as $inrow)
								@if(in_array("$inrow->parent",(array)$row['Name']))
								<li><a href="{{url('product/'.$inrow->id)}}">{{$inrow->Name}}</a></li>
								@endif
								@endforeach
							</ul>
						</div>
					</div>
					@endforeach
				</div>

			</div>
		</div>
		<div class="col-sm-9 padding-right">
			<div class="product-details"><!--product-details -->
				<div class="col-sm-5">
					<div class="view-product">
						<img id="first" src="/upload_img/{{$detail_img[0]['Image']}}" />
						
					</div>
					 <div id="similar-product" class="carousel slide" data-ride="carousel"> 

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								@foreach($detail_img as $img)
								<a href=""><img style="width: 100px;" class="sub-img" style="display: inline;" src="/upload_img/{{$img['Image']}}" ></a>
								@endforeach
							</div>

						</div>

						

					</div> 
				</div>
				<div class="col-sm-7">
					<div class="product-information"><!--/product-information-->
						<img src="images/product-details/new.jpg" class="newarrival" alt="" />
						<h2>{{$product_detail['Name']}}</h2>
						<p>Web ID: 1089772</p>
						<img src="images/product-details/rating.png" alt="" />
						<span>
							<span>Rs:{{$product_detail['price']}}</span>
							<label>Quantity:</label>
							<input type="number" class="Quantity"  value="1" />
							 <button type="button" id="qty" data-cart-id="{{$product_detail['id']}}" class="btn btn-fefault cart">
								<i class="fa fa-shopping-cart"></i>
								Add to cart
							</button>
						</span>
						<p><b>Availability:</b> In Stock</p>
						<p><b>Condition:</b> New</p>
						<p><b>Brand:</b> {{$product_detail['sku']}}</p>
						<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
					</div><!--/product-information-->
				</div>
			</div><!--/product-details-->


			<div class="category-tab shop-details-tab"><!--category-tab-->

					<div class="tab-pane fade active in" id="reviews" >
						<div class="col-sm-12">
							<h2>Product Detail</h2>
							<p>{{$product_detail['long_description']}}</p>
							
						</div>
					</div>

				</div>
			</div><!--/category-tab-->

		</div>
	</div>
</div>

 <script type="text/javascript">
			$(document).on('click', '#qty', function() {
				
				var $this = $(this);
				var qty = $('.Quantity').val();
				var id = $this.data('cart-id');
				if (qty > 0) {
					$.get('/qty_cart/'+id+'/'+qty, function(response){
				if(response.success){
					$('.modal1').text(response.message);
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
				}
			})
				}

				else
				{
					$('.modal1').text('Quantity should be greater then zero');
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
				}
				

			});

			$(".sub-img").hover(function(){
				var $this = $(this);
				var val = $this.attr('src');
				$("#first").attr("src", val);
			});

		</script>  
@endsection