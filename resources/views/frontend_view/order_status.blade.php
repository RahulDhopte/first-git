@extends('frontend_view.profile_layout')

@section('content')
@foreach($data as $row)
<?php

?>

@if(in_array("Processing",(array)$row->Status))

			<h2 style="margin-left: 70px;">Order No:{{$row->id}}</h2>
			<table style="margin-left: 70px; width: 90%;padding: 0;border: 1px solid #E6E4DF;" class="table table-condensed">

				<tbody>
					<tr>
						<td style="padding-left: 50px;">
							<img style="width: 70px" src='img/order_placed.png'>
							<p style="margin-top: 5px;">Order Placed</p>
						</td>
						<td>
							<img style="width: 70px" src='img/images.png'>
							<p>Processing</p>
						</td>

						<td>
							<p style="margin-top: 35px;">Not Available</p>
							<p style="">Shipped</p>
						</td>
						<td>
							<p style="margin-top: 35px;">Not Available</p>
							<p>Delivered</p>
						</td>
					</tr>
				</tbody>
			</table>
			<h2 style="margin-left: 70px;">INVOICE</h2>
			<p style="margin-left: 70px;">Order No:{{$row->id}}</p>
			<p style="margin-left: 70px;">Ship To : <?php echo $row->add1; ?> </p>
			

@endif

@if(in_array("Order Placed",(array)$row->Status))
			<h2 style="margin-left: 70px;">Order No:{{$row->id}}</h2>
			<table style="margin-left: 70px; width: 90%;padding: 0;border: 1px solid #E6E4DF;" class="table table-condensed">

				<tbody>
					<tr>
						<td style="padding-left: 50px;">
							<img style="width: 70px" src='img/order_placed.png'>
							<p style="margin-top: 5px;">Order Placed</p>
						</td>
						<td>
							<p style="margin-top: 35px;">Not Available</p>
							<p>Processing</p>
						</td>
						<td>
							<p style="margin-top: 35px;">Not Available</p>
							<p>Shipped</p>
						</td>
						<td>
							<p style="margin-top: 35px;">Not Available</p>
							<p>Delivered</p>
						</td>
						
					</tr>
				</tbody>
			</table>
			<h2 style="margin-left: 70px;">INVOICE</h2>
			<p style="margin-left: 70px;">Order No:{{$row->id}}</p>
			<p style="margin-left: 70px;">Ship To : <?php echo $row->add1; ?> </p>
			

@endif

@if(in_array("Shipped",(array)$row->Status))
			<h2 style="margin-left: 70px;">Order No:{{$row->id}}</h2>
			<table style="margin-left: 70px; width: 90%;padding: 0;border: 1px solid #E6E4DF;" class="table table-condensed">

				<tbody>
					<tr>
						<td style="padding-left: 50px;">
							<img style="width: 70px" src='img/order_placed.png'>
							<p style="margin-top: 5px;">Order Placed</p>
						</td>
						<td>
							<img style="width: 70px" src='img/images.png'>
							<p>Processing</p>
						</td>
						<td>
							<img style="width: 70px" src='img/download.png'>
							<p>Shipped</p>
						</td>
						<td>
							<p style="margin-top: 35px;">Not Available</p>
							<p>Processing</p>
						</td>
						
					</tr>
				</tbody>
			</table>
			<h2 style="margin-left: 70px;">INVOICE</h2>
			<p style="margin-left: 70px;">Order No:{{$row->id}}</p>
			<p style="margin-left: 70px;">Ship To : <?php echo $row->add1; ?> </p>
			

@endif

@endforeach

@endsection