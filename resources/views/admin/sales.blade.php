@extends('admin.layout')

@section('content')
<h3>Sales List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">Sales Report</h3>
			<br>
			<div class="container">

				<table id="sales_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Order Placed</th>
							<th>Total</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>



<script>
	$(document).ready(function() {
		$('#sales_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/sales_data') }}",
			"columns":[
			{ "data": "name" },
			{ "data": "cout" },
			{ "data": "total"}
			]
		});
	});

</script>
@endsection