<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->

<!-- jQuery Modal -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style type="text/css">
    	.error{
    		color: red;
    	}
    </style>
</head><!--/head-->

<body>
	<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   
  ?>
	<header id="header"><!--header-->
		
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ url('index') }}"><img src="{{URL::asset('/img/home/logo.png')}}" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{ url('profile') }}"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="{{ url('list_whislist') }}"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{ url('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li>@if (Route::has('login'))
                <div style="font-size: 25px; margin: -2px 5px;">
                    @auth
                             

                                    <a class="" href="{{ route('logout') }}"
                                    style="	" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            
                           
                    @else
                        <a style=""  href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                         <a style="margin-left: 15px;"  href="{{ route('register') }}">Register</a>
                        @endif

                    @endauth
                </div>
            @endif</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('index') }}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ url('index') }}">Products</a></li>
										 
										<li><a href="{{ url('checkout') }}">Checkout</a></li> 
										<li><a href="{{ url('cart') }}">Cart</a></li> 
										 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Profile<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
                                        <li><a href="{{ url('address') }}">Add Address</a></li>
										<li><a href="{{ url('list_address') }}">List Address</a></li>
										<li><a href="{{ url('password') }}">Change Password</a></li>
										<li><a href="{{ url('track_order') }}">My Order</a></li>
										<li><a href="{{ url('chk_email') }}">Order Status</a></li>
                                    </ul>
                                </li>
								<li><a href="{{ url('contactUs') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div> -->
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->



	<section class="content container-fluid">
   @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
    {!! session('message.content') !!}
    </div>
@endif
    @yield('content')

    </section>

    <section class="content container-fluid">
   
    @yield('second')

    </section>

	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div style="width: 15.333333%;margin-left: 50px;" class="col-md-4">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								
								<li><a href="{{url('contactUs')}}">Contact Us</a></li>
								<li><a href="{{url('chk_email')}}">Order Status</a></li>
								
							</ul>
						</div>
					</div>
					<div style="width: 15.333333%;" class="col-md-4">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<?php 
								$data = DB::select("Select * from cms");
								foreach ($data as $key ) {
								?>
								<li><a href="{{url('cms_content/'.$key->id)}}">{{$key->title}}</a></li>
								<?php }?>
							</ul>
						</div>
					</div>
					<div style="width: 31.333333%;" class="col-md-4">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">	
								<li><a href="{{url('product/4')}}">Mens</a></li>
								<li><a href="{{url('product/6')}}">Womens</a></li>
								<li><a href="{{url('product/8')}}">Kids</a></li>
							</ul>
						</div>
					</div>
					
					<div style="width: 31.333333%;" class="col-md-4 ">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" id="chimp" placeholder="Your email address" />
								<button type="submit" id="chimp_btn" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-body">
        <p class="modal1"></p>
        
      </div>
    </div>

  </div>
</div>
    <!-- <script src="{{ asset('front_js/jquery.js')}}"></script> -->
	<script src="{{ asset('front_js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('front_js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('front_js/price-range.js')}}"></script>
    <script src="{{ asset('front_js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('front_js/main.js')}}"></script>
    <script src="{{ asset('js/address.js')}}"></script>
    \<script src="{{ asset('js/profile.js')}}"></script>
    \<script src="{{ asset('js/password.js')}}"></script>
     <script type="text/javascript">
    	$('#chimp_btn').click(function(e) {
    	e.preventDefault();
    	console.log('asdsad');
    	var mail = $('#chimp').val();
    	console.log(mail);
    	$.ajax({
                type: "POST",
                url: "{{'add_chimp'}}",
                  data: {
                    "_token": "{{ csrf_token() }}",
                    "mail": mail,
                },
                cache: false,
                success: function (response) {
                	if (response.success) {
                		$('.modal1').text(response.message);
					$('#myModal').modal('show');
					setTimeout(function(){
						$('#myModal').modal('hide')
					},2000);
                	}
                	
                }
});
    });
    </script>
     @yield('js')
</body>
</html>
	