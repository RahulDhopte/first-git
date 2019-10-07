@extends('admin.layout')

@section('content')
<h3>Configuration List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">All Configuration</h3>
			<br>
			<div align="right">
				<a href="{{url('config')}}" style=" margin: 0px -100px;margin-top: -30px;" class="btn btn-primary">Add</a>
			</div>
			<div class="container">

				<table id="config_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Config Key</th>
							<th>Config Value</th>
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
		$('#config_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/config_data') }}",
			"columns":[
			{ "data": "conf_key" },
			{ "data": "conf_value" },
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