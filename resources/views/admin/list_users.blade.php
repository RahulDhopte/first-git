@extends('admin.layout')

@section('content')
 <!-- 
 -->
 <h3>User List</h3>
 <div class="box">

 	<h3 style="margin-left: 10px;">All Users</h3>
 	<br>
 	<div align="right">
 		<a href="{{url('add/user/view')}}" style=" margin: 0px 45px;margin-top: -30px;" class="btn btn-primary">Add</a>
 	</div>

 	<div class="container">

 		<table id="user_table" class="table table-bordered" style="width:100%">
 			<thead>
 				<tr>
 					<th>User Name</th>
 					<th>First Name</th>
 					<th>Last Name</th>
 					<th>Email</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 		</table>
 	</div>




 </div>
 <script>

 	$(document).ready(function() {
 		$('#user_table').DataTable({
 			"processing": true,
 			"serverSide": true,
 			"ajax": "{{ url('/user_data') }}",
 			"columns":[
 			{ "data": "username" },
 			{ "data": "first_name" },
 			{ "data": "last_name" },
 			{ "data": "email" },
 			{data: 'action', name: 'action', orderable: false, searchable: false},
 			]
 		});
 	});


 	// $(document).on('click', '#delete', function(e) {

 	// 	e.preventDefault();
 	// 	var x = confirm("Are you sure you want to delete?");
 	// 	if (x)
 	// 		return true;
 	// 	else
 	// 		return false;

 	// });


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