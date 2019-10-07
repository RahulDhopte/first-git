@extends('admin.layout')

@section('content')
 <div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 >All Category</h3>
		<br>
		<div align="right">
			<a href="{{url('category')}}" style=" margin: 0px 45px;" class="btn btn-primary">Add</a>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Created_by</th>
				<th>Parent_id</th>
				<th>Modify_by</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			@foreach($data as $row)
			 	<tr>
			 		<td>{{$row['Name']}}</td>
			 		<td>{{$row['created_by']}}</td>
			 		<td>{{$row['parent_id']}}</td>
			 		<td>{{$row['modify_by']}}</td>
			 		<?php if ($row['status'] == '1') {
			 			?>
			 			<td>Active</td>
			 			<?php 
			 		}
			 		else{
			 		 ?>
			 		<td>Inactive</td>
			 	<?php } ?>	
			 		
			 		<td> <a style="margin-bottom: 5px;" class="btn btn-primary" href="{{url('edit_category/'.$row['id'])}}">EDIT</a> <form method="post" action="{{url('delete_category/'.$row['id'])}}">
			 			{{csrf_field()}}
			 			<input type="hidden" name="del" value="DELETE"/>
			 			<button type="submit" class="btn btn-primary">DELETE</button>
			 		</form></td>	
			 	</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
@endsection