@extends('admin.layout')

@section('content')
<h3>CMS List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">Cms Table </h3>
			<br>
			<div align="right">

				<a href="{{url('show_cms')}}" style=" margin: 0px 45px;margin-top: -30px;" class="btn btn-primary">Add</a>
			</div>
			<div class="container">

				<table id="cms_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Title</th>
							<th>Content</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<script>
	$(document).ready(function() {
		$('#cms_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/cms_data') }}",
			"columns":[
			{ "data": "title" },
			{ "data": "content" },
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