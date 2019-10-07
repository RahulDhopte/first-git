 @extends('frontend_view.profile_layout')

@section('content')
 <div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 style="margin-left: 65px;margin-bottom: -45px;">Your Address</h3>
		<br>
		<div align="right">
			<a href="{{url('address')}}" style=" margin: 5px 65px;" class="btn btn-primary">Add</a>
		</div>
		<?php 
		if (empty($address[0]['address_1'])) {
			
		?>
		<h3 align="center">No Address Added</h3>
		<?php 
	}
		?>
		<table style="width: 90%; margin-left: 65px;" class="table table-bordered">
			<tr>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Country</th>
				<th>Zipcode</th>
				<th>Action</th>
			</tr>
			@foreach($address as $row)
			 	<tr>
			 		<td>{{$row['address_1']}}
			 		<?php if (!empty($row['address_2'])) {
			 			?>
			 			{{$row['address_2']}}
			 			<?php 
			 		}
			 		else{
			 		 ?>
			 		</td>
			 	<?php } ?>
			 			

			 		<td>{{$row['city']}}</td>
			 		<td>{{$row['state']}}</td>
			 		<td>{{$row['country']}}</td>
			 		<td>{{$row['zipcode']}}</td>
			 					 		
			 		<td> <a  style="margin-left: 10px;" class="btn btn-primary" href="{{url('edit_address/'.$row['id'])}}">EDIT</a> 
			 			<form onsubmit="return ConfirmDelete()" method="post" action="{{url('delete_address/'.$row['id'])}}" >
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