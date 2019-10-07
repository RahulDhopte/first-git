@extends('admin.layout')

@section('content')
<h3>Registered Users List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">Registered Customer</h3>
			<br>
			<div class="container">

				<table id="customer_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Firstname</th>
							<th>Laststname</th>
							<th>Email</th>
							<th>Username</th>
							<th>Status</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#customer_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/customer_data') }}",
			"columns":[
			{ "data": "first_name" },
			{ "data": "last_name" },
			{ "data": "email"},
			{ "data": "username"},
			{ "data": "status"},
			]
		});
	});

</script>
@endsection