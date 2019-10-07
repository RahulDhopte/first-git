@extends('admin.layout')

@section('content')
<div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 >All Coupon</h3>
		<br>
		<div align="right">
			<a href="{{url('coupon')}}" style=" margin: 0px 45px;" class="btn btn-primary">Add</a>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>Code</th>
				<th>Percent_Off</th>
				<th>NO_Of_Use</th>
				<th>Action</th>
			</tr>
			@foreach($coupon_data as $row)
			 	<tr>
			 		<td>{{$row->code}}</td>
			 		<td>{{$row->percent_off}}</td>
			 		<td>{{$row->NO_of_use}}</td>
			 			
			 		
			 		<td> <a style="float: left;" class="btn btn-primary" href="{{url('edit_coupon/'.$row->id)}}">EDIT</a> <form method="post" action="{{url('delete_coupon/'.$row->id)}}">
			 			{{csrf_field()}}
			 			<input type="hidden" name="del" value="DELETE"/>
			 			<button style="margin-left: 5px;" type="submit" class="btn btn-primary">DELETE</button>
			 		</form></td>	
			 	</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
@endsection