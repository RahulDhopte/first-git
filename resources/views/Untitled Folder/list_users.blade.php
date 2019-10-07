@extends('admin.layout')

@section('content')
 <!-- 
 -->
 <div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 >All Users</h3>
		<br>
		<div align="right">
			<a href="{{url('add/user/view')}}" style=" margin: 0px 45px;" class="btn btn-primary">Add</a>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>Firstname</th>
				<th>Laststname</th>
				<th>Email</th>
				<th>Username</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			@foreach($Users as $row)
			 	<tr>
			 		<td>{{$row['first_name']}}</td>
			 		<td>{{$row['last_name']}}</td>
			 		<td>{{$row['email']}}</td>
			 		<td>{{$row['username']}}</td>
			 		<td>{{$row['status']}}</td>
			 					 		
			 		<td> <a  style="float: left;" class="btn btn-primary" href="{{url('edit/'.$row['id'])}}">EDIT</a> <form method="post" action="{{url('delete/user/'.$row['id'])}}" >
			 			{{csrf_field()}}
			 			<input  type="hidden" name="del" value="DELETE"/>
			 			<button style="margin-left: 5px;" type="submit" class="btn btn-primary">DELETE</button>
			 		</form></td>	
			 	</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
@endsection