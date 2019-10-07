@extends('frontend_view.search')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="slider-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#slider-carousel" data-slide-to="1"></li>
					<li data-target="#slider-carousel" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">
					<div class="item active">
						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPER</h1>
							<h2>Free E-Commerce Template</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							
						</div>
						<div class="col-sm-6">
							<img src="{{URL::asset('/img/home/girl1.jpg')}}" class="girl img-responsive" alt="" />
							<img src="images/home/pricing.png"  class="pricing" alt="" />
						</div>
					</div>
					<div class="item">
						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPER</h1>
							<h2>100% Responsive Design</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							
						</div>
						<div class="col-sm-6">
							<img src="{{URL::asset('/img/home/girl2.jpg')}}" class="girl img-responsive" alt="" />
							<img src="images/home/pricing.png"  class="pricing" alt="" />
						</div>
					</div>

					<div class="item">
						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPER</h1>
							<h2>Free Ecommerce Template</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							
						</div>
						<div class="col-sm-6">
							<img src="{{URL::asset('/img/home/girl3.jpg')}}" class="girl img-responsive" alt="" />
							<img src="images/home/pricing.png" class="pricing" alt="" />
						</div>
					</div>

				</div>

				<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>

		</div>
	</div>
</div>
@endsection


@section('second')
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left-sidebar">
				<h2>Category</h2>
				<div class="panel-group category-products" id="accordian"> 
					<div class="panel panel-default">

					</div> 
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


				<div class="price-range"><!--price-range-->
					<h2>Price Range</h2>
					<div class="well text-center">
						<input type="text" class="span2" value="0,{{$price[0]->max}}" data-slider-min="0" data-slider-max="{{$price[0]->max}}" data-slider-step="5" data-slider-value="[0,{{$price[0]->max}}]" id="sl2" ><br />
						<b class="pull-left">Rs 0</b> <b class="pull-right">Rs {{$price[0]->max}}</b>
					</div>
				</div><!--/price-range-->

			</div>
		</div>

		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<h2 id="new_Price" class="title text-center">Features Items</h2>
				<div class="container-fluid prodct">
					@foreach($product as $pro)
					<div class="col-md-4" >
						<div style="height: 400px;" class="product-image-wrapper">
							<div class="single-products">
								<div style="height: 360px;"  class="productinfo text-center">
									<img style="width:150px;"src='upload_img/{{$pro->img}}' />
									<h2>Rs:{{$pro->price}}</h2>
									<p style=" padding: 0px 20px ; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;">{{$pro->Name}}</p>

									<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

								</div>
								<div class="product-overlay" >
									<div class="overlay-content">
										<h2>Rs:{{$pro->price}}</h2>
										<p style=" padding: 0px 20px ; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;">{{$pro->Name}}</p>
										<a href="{{url('product_detail/'.$pro->id)}}" class="btn btn-default" style="background: #fff;border: 0 none;border-radius: 0;color: #FE980F;font-family: 'Roboto', sans-serif;font-size: 15px;margin-bottom: 25px;
										"><i class="fa fa-eye"></i>View</a>
										<?php if(empty(!$pro->quantity)) { ?>
										<a href="#" data-cart-id="{{$pro->id}}"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										<?php } else{?>
									
										<strike><a href='#' class="btn btn-default  add-to-cart">Out Of Stock</a></strike>
									<?php }?>
									</div>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<?php if(empty($pro->wishid)) { ?>
									<li class="added"><a href="" class="wish" data-wish-id="{{$pro->id}}" ><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									
									<?php } else{?>
									<li>
										<p style='margin-left: 70px;color: #FE980F;font-size: 20px;'>Already Added</p></li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="clearfix"></div>
						
					
					
				</div>
			</div>
		</div>

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
					$('.modal1').text(response.message);
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);

				}
			})
		});

        $(document).on('click', '.wish', function(e) {
			
				e.preventDefault();
				console.log('clicked')
				var $this = $(this);
				var id = $this.data('wish-id');
				$.get('/add_wishlist/'+id, function(response){
					if(response.success){
						$this.closest('li').html("<p style='margin-left: 70px;color: #FE980F;font-size: 20px;'>Already Added</p>");
						$('.modal1').text(response.message);
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
				}
			})
			
		});

        $(document).on('click', '#search_pro', function(e) {
			
				e.preventDefault();
				
				var $this = $(this);
				console.log('clicked');
				var name = $('#pro_name').val();
				console.log(name);
				$.get('/search_pro/'+name, function(response){
					if(response.success){
						$('.prodct').remove();
						console.log('asdasd');
						console.log(response.product);
						 $.each(response.product,function(key, responseproduct)
                	 {
						$('#new_Price').append('<div class="container-fluid prodct"><div class="col-md-4" ><div style="height: 400px;" class="product-image-wrapper"><div class="single-products"><div style="height: 360px;"  class="productinfo text-center"><img style="width:150px;" src="upload_img/'+responseproduct.img+'" /><h2>Rs:'+responseproduct['price']+'</h2><p style=" padding: 0px 20px ; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;">'+responseproduct['Name']+'</p><a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div><div class="product-overlay" ><div class="overlay-content"><h2>Rs:'+responseproduct['price']+'</h2><p style=" padding: 0px 20px ; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;">'+responseproduct['Name']+'</p><a href="'+response.url+'/'+responseproduct['id']+'" class="btn btn-default" style="background: #fff;border: 0 none;border-radius: 0;color: #FE980F;font-size: 15px;margin-bottom: 25px;"><i class="fa fa-eye"></i>View</a><a style="margin-left: 10px;" href="#" data-cart-id="'+responseproduct['id']+'"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div></div></div><div class="choose"><ul class="nav nav-pills nav-justified">'+ ((responseproduct['wishid'] == null) ? '<li class="added"><a href="" class="wish" data-wish-id="'+responseproduct['id']+'" ><i class="fa fa-plus-square"></i>Add to wishlist</a></li>' : '<li><p>Already Added</p></li></ul></div></div></div></div>') );
						});

						 $('.modal1').text('Product Found');
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
				}

				else{
					$('.modal1').text('Invalid Product Name');
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
				}
			})
			
		});


          $('.span2').on('slide', function (ev) {
          	
          	var range = $('#sl2').val();
          	$.ajax({
                type: "POST",
                url: "{{'get_range'}}",
                  data: {
                    "_token": "{{ csrf_token() }}",
                    "range": range,
                    
                },
                cache: false,
                success: function (response) {
                	
                	$('.prodct').remove();

                	 $.each(response.product,function(key, responseproduct)
                	 {
                	 	console.log(responseproduct);
                	 	$('#new_Price').append('<div class="container-fluid prodct"><div class="col-md-4" ><div style="height: 400px;" class="product-image-wrapper"><div class="single-products"><div style="height: 360px;"  class="productinfo text-center"><img style="width:150px;" src="upload_img/'+responseproduct.img+'" /><h2>Rs:'+responseproduct['price']+'</h2><p style=" padding: 0px 20px ; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;">'+responseproduct['Name']+'</p><a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div><div class="product-overlay" ><div class="overlay-content"><h2>Rs:'+responseproduct['price']+'</h2><p style=" padding: 0px 20px ; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;">'+responseproduct['Name']+'</p><a href="'+response.url+'/'+responseproduct['id']+'" class="btn btn-default" style="background: #fff;border: 0 none;border-radius: 0;color: #FE980F;font-size: 15px;margin-bottom: 25px;"><i class="fa fa-eye"></i>View</a><a style="margin-left: 10px;" href="#" data-cart-id="'+responseproduct['id']+'"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div></div></div><div class="choose"><ul class="nav nav-pills nav-justified">'+ ((responseproduct['wishid'] == null) ? '<li class="added"><a href="" class="wish" data-wish-id="'+responseproduct['id']+'" ><i class="fa fa-plus-square"></i>Add to wishlist</a></li>' : '<li><p>Already Added</p></li></ul></div></div></div></div>') );
                	 });

                }
});
    });
		</script>
		@endsection
		
