@extends('admin.layout')

@section('content')
 <!-- 
 -->
 <h3>Product Attribute List</h3>
 <div class="box">
 	<div class="row">
 		<div class="col-md-12">
 			<br>
 			<h3 style="margin-left: 10px;">All Product Attributes</h3>
 			<br>
 			<div align="right">
 				<a href="{{url('product_atrribute')}}" style=" margin: 0px -100px;margin-top: -30px;" class="btn btn-primary">Add</a>
 			</div>
 			<div class="container">

 				<table id="config_table" class="table table-bordered" style="width:100%">
 					<thead>
 						<tr>
 							<th>Attribute Name</th>
 							<th>Attribute Value</th>
 							<th>Action</th>
 						</tr>
 					</thead>
 				</table>
 			</div>

 		</div>
 	</div>
 </div>
 <script>
 	$(document).ready(function() {
 		$('#config_table').DataTable({
 			"processing": true,
 			"serverSide": true,
 			"ajax": "{{ url('/product_attribute_data') }}",
 			"columns":[
 			{ "data": "Name" },
 			{ "data": "attribute_values" },
 			{data: 'action', name: 'action', orderable: false, searchable: false},
 			]
 		});
 	});
 	function ConfirmDelete()
 	{
 		var x = confirm("Are you sure you want to delete?");
 		if (x)
 			return true;
 		else
 			return false;
 	}

 </script>
 @endsection