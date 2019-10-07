@extends('admin.layout')

@section('content')
<h3>Email List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">Email Table </h3>
			<br>
			<div align="right">

				<a href="{{url('show_email')}}" style=" margin: 0px 45px;margin-top: -30px;" class="btn btn-primary">Add</a>
			</div>

			<div class="container">

				<table id="email_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Title</th>
							<th>Subject</th>
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
		$('#email_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/email_data') }}",
			"columns":[
			{ "data": "title" },
			{ "data": "subject" },
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