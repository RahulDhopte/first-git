@extends('admin.layout')

@section('content')
<h3>Coupons Used List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">Coupons Report</h3>
			<br>
			<div class="container">

				<table id="coup_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
								<th>Name</th>
								<th>Used</th>
								<th>Remaining</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#coup_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/coup_data') }}",
			"columns":[
			{ "data": "code" },
			{ "data": "cout" },
			{ "data": "used"},
			]
		});
	});

</script>
@endsection