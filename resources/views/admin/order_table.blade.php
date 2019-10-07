@extends('admin.layout')

@section('content')
<h3>Order List</h3>
<div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 style="margin-left: 10px;">All Orders</h3>
		<br>
		<div class="container">
				<table id="coupon_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Order ID</th>
							<th>Username</th>
							<th>Grand Total</th>
							<th>Status</th>
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
		$('#coupon_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('order_data') }}",
			"columns":[
			{ "data": "id" },
			{ "data": "username" },
			{ "data": "grand_total" },
			{ "data": "Status" },
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