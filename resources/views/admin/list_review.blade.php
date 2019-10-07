@extends('admin.layout')

@section('content')
<h3>Review List</h3>
<div class="box">
	<div class="row">
		<div class="col-md-12">
			<br>
			<h3 style="margin-left: 10px;">All Reviews</h3>
			<br>
			<?php
			if (empty($data[0]['name'])) {
				
				?>
				<h3 align="center">No Review</h3>
				<?php
			}
			?>
			<div class="container">

				<table id="review_table" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Reply</th>
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
		$('#review_table').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "{{ url('/review_data') }}",
			"columns":[
			{ "data": "name" },
			{ "data": "email" },
			{ "data": "message" },
			{ "data": "note_admin" },
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