@extends('frontend_view.layout')

@section('content')

  <div class="container text-center">
		<div class="logo-404">
			<a href="{{url('index')}}"><img src="{{URL::asset('/upload_img/logo.png')}}"></a>
		</div>
		<div class="content-404">
			<img src="{{URL::asset('/upload_img/404.png')}}" class="img-responsive" alt="" />
			<h1><b>OPPS!</b></h1>
			<p>Something went wrong</p>
			<h2 style="margin-bottom: 40px;"><a href="{{url('index')}}">Bring me back Home</a></h2>
		</div>
	</div>

@endsection