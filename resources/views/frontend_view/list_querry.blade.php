 @extends('frontend_view.profile_layout')

@section('content')
 <div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 style="margin-left: 65px;margin-bottom: -45px;">Your Querries</h3>
		<br>
		<div align="right">
			<a href="{{url('contactUs')}}" style=" margin: 5px 65px;" class="btn btn-primary">Add</a>
		</div>
		<table style="width: 90%; margin-left: 65px;" class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Number</th>
				<th>Note </th>
				<th>Message</th>
				<th>Action</th>
			</tr>
			@foreach($data as $row)
			 	<tr>
			 		<td>{{$row['name']}} </td>
			 		<td>{{$row['email']}}</td>
			 		<?php if (!empty($row['contact_no'])) {
			 			?>
			 			<td>{{$row['contact_no']}}</td>
			 			<?php 
			 		}
			 		else{
			 		 ?>
			 		<td>Not Available</td>
			 	<?php } ?>
			 		
			 		<?php if (!empty($row['note_admin'])) {
			 			?>
			 			<td>{{$row['note_admin']}}</td>
			 			<?php 
			 		}
			 		else{
			 		 ?>
			 		<td>Not Available</td>
			 	<?php } ?>
			 		
			 		<td>{{$row['message']}}</td>
			 		
			 					 		
			 		<td> 
			 			<form onsubmit="return ConfirmDelete()" method="post" action="{{url('delete_querry/'.$row['id'])}}" >
			 			{{csrf_field()}}
			 			
			 			<button style="margin-left: 5px;"  type="submit" class="btn btn-primary">DELETE</button>
			 		</form>
			 	</td>	
			 	</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
<script>

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