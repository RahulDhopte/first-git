@extends('admin.layout')

@section('content')

<!-- Small boxes (Stat box) -->
<h3>Dashboard</h3>
<div style="margin-right: -120px; margin-top: 20px">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$data[0]->Total}}</h3>

					<p>Total Orders</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="{{url('order_table')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner ">
					<h3>{{$user[0]->user}}</h3>

					<p>User Registrations</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="{{url('user/list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-6 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>₹{{$data[0]->Discount}}</h3>

					<p>Total Sell</p>
				</div>
				<div class="icon">
					<i class="fa fa-bar-chart"></i>
				</div>
				<a href="{{url('sales')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<a style="float: left;background-color: #fafafa !important;border-color: #646464 !important;color:#646464 !important;width: 20%;" href="{{url('user/list')}}" class="btn btn-primary">
			<i class="fa fa-users"></i>
			<div>Customers</div>
			<span class="badge badge-important">{{$user[0]->user}}</span>
		</a>
		<a style="float: left;background-color: #fafafa !important;border-color: #646464 !important;color:#646464 !important;width: 20%;    margin-left: 33px;" href="{{url('sales')}}" class="btn btn-primary">
			<i class="fa fa-flag"></i>
			<div style="padding-bottom: 20px;">Reports</div>
		</a>
		<a style="background-color: #fafafa !important;border-color: #646464 !important;color:#646464 !important;    width: 20%;margin-left: 33px; " href="{{url('list_category')}}" class="btn btn-primary">
			<i class="fa fa-sitemap"></i>
			<div style="padding-bottom: 20px;">Categories</div>
		</a>
	</div>	
	<!-- /.row -->
	<!-- Main row -->
	<div class="row">
		<!-- Left col -->

		<!-- Custom tabs (Charts with tabs)-->
		<!-- /.nav-tabs-custom -->

		<!-- Chat box -->
		<div class="box box-success" style="margin-left:10px;margin-top: 40px; ">
			<div class="box-header">
				<i class="fa fa-comments-o"></i>

				<h3 class="box-title">Chat</h3>
			</div>


			<div class="cart-chat">
				@foreach($chat as $row)
				<div class="chat">
					<div class="user" style="background-color: #a09a9a;padding: 2px 0px 1px 10px;color: white;">
						<div style="border-radius:28px ;width: 22px;margin-top: 5px;height: 20px;padding: 2px 0px 0px 5px;    background-color: black;" class="fa fa-user"><h4>   {{strtoupper($row['name'])}}</h4></div>
						
						<span style="float: right;padding-right: 10px;">{{$row['created_at']}}</span>
						<p>{{$row['message']}}</p>
					</div>
					<div class="admin" style="background-color: #131212;padding: 2px 0px 1px 10px;color: white;margin: 6px 0px 0px 25px;">
						<div style="border-radius:28px ;width: 20px;margin-top: 5px;height: 18px;padding: 2px 0px 0px 5px;    background-color: #a09a9a;" class="fa fa-lock">
							<h4 >ADMIN</h4>
						</div>
						
						<p>{{$row['note_admin']}}</p>
					</div>
				</div>
				@endforeach
			</div>
			
			

		</div>

	</div>
</div>
<!-- /.row (main row) -->


@endsection