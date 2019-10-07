@extends('admin.layout')

@section('content')
<h3>Product List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">All Product</h3>
			<br>
			<div align="right">
				<a href="{{url('product')}}" style=" margin: 0px -100px;margin-top: -30px;" class="btn btn-primary">Add</a>
			</div>
			<div class="container">

				<table id="product_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Special Price</th>
							<th>Quantity</th>
							<th>Meta Title</th>
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
		$('#product_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/product_data') }}",
			"columns":[
			{ "data": "Name" },
			{ "data": "price" },
			{ "data": "special_price" },
			{ "data": "quantity" },
			{ "data": "meta_title" },
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