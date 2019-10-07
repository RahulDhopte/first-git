@extends('admin.layout')

@section('content')
<h3>Coupon List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px">All Coupon</h3>
			<br>
			<div align="right">
				<a href="{{url('coupon')}}" style=" margin: 0px 45px;margin-top: -30px;" class="btn btn-primary">Add</a>
			</div>

			<div class="container">
				<table id="coupon_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Code</th>
							<th>Percent Off</th>
							<th>NO Of Use</th>
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
			"ajax": "{{ url('coupon_data') }}",
			"columns":[
			{ "data": "code" },
			{ "data": "percent_off" },
			{ "data": "NO_of_use" },
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