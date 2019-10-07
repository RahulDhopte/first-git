	<!-- 	<div style="padding: 10px;">
		<table class="table table-bordered">
			<tr>
				<th>Firstname</th>
				<th>Laststname</th>
				<th>Email</th>
				<th>Username</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			@foreach($Users as $row)
			 	<tr>
			 		<td>{{$row['first_name']}}</td>
			 		<td>{{$row['last_name']}}</td>
			 		<td>{{$row['email']}}</td>
			 		<td>{{$row['username']}}</td>
			 		<td>{{$row['status']}}</td>
			 		<?php 
			 		if ($row['id'] != $id) {
			 		?>
			 				 		
			 		<td> <a  style="float: left;" class="btn btn-primary" href="{{url('edit/'.$row['id'])}}">EDIT</a> 
			 			<form onsubmit="return ConfirmDelete()" method="post" action="{{url('delete/user/'.$row['id'])}}" >
			 			{{csrf_field()}}
			 			<input  type="hidden" name="del" value="DELETE"/>
			 			<button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
			 		</form>
			 	</td>	
			 <?php }?>
			 	</tr>
			@endforeach
		</table>
	</div>  -->








{data: 'image', name: 'image', orderable: false, searchable: false},<th>Image</th>



	<div style="padding: 10px;">
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Parent Name</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			@foreach($data as $row)
			 	<tr>
			 		<td>{{$row->Name}}</td>
			 		<td>{{$row->parent}}</td>
			 		<?php if ($row->status == '1') {
			 			?>
			 			<td>Active</td>
			 			<?php 
			 		}
			 		else{
			 		 ?>
			 		<td>Inactive</td>
			 	<?php } ?>	
			 		
			 		<td> <a style="margin-bottom: 5px;" class="btn btn-primary" href="{{url('edit_category/'.$row->id)}}">EDIT</a>
			 		 <form onsubmit="return ConfirmDelete()" method="post" action="{{url('delete_category/'.$row->id)}}">
			 			{{csrf_field()}}
			 			<input type="hidden" name="del" value="DELETE"/>
			 			<button type="submit" class="btn btn-primary">DELETE</button>
			 		</form></td>	
			 	</tr>
			@endforeach
		</table>
	</div>





	<div style="padding: 10px;">
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Order Placed</th>
				<th>Remaining</th>
				
			</tr>
			<?php $total = 0;?>
			@foreach($data as $row)
			 	<tr>
			 		<td>{{$row->name}}</td>
			 		<td>{{$row->cout}}</td>
			 		<td>{{$row->quantity-$row->cout}}</td>	
			 		<?php
			 		$total += $row->cout*$row->price ;
			 		?>
			 	</tr>
			@endforeach
			<tr>
				<td>Total</td>
				<td></td>
				<td>{{$total}}</td>
			</tr>
		</table>
	</div>







        
        <!-- <script type="" src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
        <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
        <script src="~/App_Theme/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>        -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
       <!--  <script type="text/javascript">
          $.ajaxSetup({
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') -->











<div style="padding: 10px;">
		<table class="table table-bordered">
			<tr>
				<th>Order ID</th>
				<th>Username</th>
				<th>Grand Total</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			
			@foreach($data as $row)
			 	<tr>
			 		<td>{{$row->id}}</td>
			 		<td>{{$row->username}}</td>
			 		<td>{{$row->grand_total}}</td>	
			 		<td>{{$row->Status}}</td>
			 		<td><a style="margin-bottom: 5px;margin-left: 5px;" class="btn btn-primary" href="{{url('show_order/'.$row->id)}}">Details</a>
			 			<a  style="float: left;" class="btn btn-primary" href="{{url('edit_order/'.$row->id)}}">EDIT</a> </td>
			 	</tr>
			@endforeach
		</table>
	</div>


















        

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

