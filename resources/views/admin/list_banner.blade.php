@extends('admin.layout')

@section('content')
<h3>Banner List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">All Banner</h3>
			<br>
			<div align="right">
				
				<a href="{{url('banner')}}" style=" margin: 0px -100px;margin-top: -30px;" class="btn btn-primary">Add</a>
			</div>
			<div class="container">

				<table id="banner_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Image</th>
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
		$('#banner_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/banner_data') }}",
			"columns":[
			{ "data": "Name" },
			{ "data": "Description" },
			{data: 'image', name: 'image', orderable: false, searchable: false},
			{ "data": "status" },
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