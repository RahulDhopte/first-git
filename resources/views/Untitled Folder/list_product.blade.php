@extends('admin.layout')

@section('content')
 <div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 >All Category</h3>
		<br>
		<div align="right">
			<a href="{{url('product')}}" style=" margin: 0px 45px;" class="btn btn-primary">Add</a>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<!-- <th>SKU</th> -->
				<th>Price</th>
				<th>Special_Price</th>
				
				<th>Status</th>
				<th>Quantity</th>
				<th>Meta_title</th>
				<th>Meta_Status</th>
				<th>Action</th>
			</tr>
			@foreach($data as $row)
			 	<tr>
			 		<td>{{$row['Name']}}</td>
			 		<!-- <td>{{$row['sku']}}</td> -->
			 		<td>{{$row['price']}}</td>
			 		<td>{{$row['special_price']}}</td>
			
			 		<?php if ($row['status'] == '1') {
			 			?>
			 			<td>Active</td>
			 			<?php 
			 		}
			 		else{
			 		 ?>
			 		<td>Inactive</td>
			 	<?php } ?>
			 	     <td>{{$row['quantity']}}</td>
			 	     <td>{{$row['meta_title']}}</td>
			 	     <?php if ($row['meta_status'] == '1') {
			 			?>
			 			<td>Active</td>
			 			<?php 
			 		}
			 		else{
			 		 ?>
			 		<td>Inactive</td>
			 	<?php } ?>
			 		
			 		<td> <a style="float: left;" class="btn btn-primary" href="{{url('edit_product/'.$row['id'])}}">EDIT</a> <form method="post" action="{{url('delete_product/'.$row['id'])}}">
			 			{{csrf_field()}}
			 			<input type="hidden" name="del" value="DELETE"/>
			 			<button style="margin-top: 5px;" type="submit" class="btn btn-primary">DELETE</button>
			 		</form></td>	
			 	</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
@endsection