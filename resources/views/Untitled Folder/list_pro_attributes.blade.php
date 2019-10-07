@extends('admin.layout')

@section('content')
 <!-- 
 -->
 
 <div class="box">
<div class="row">
	<div class="col-md-12">
		<br>
		<h3 >All Product Attributes</h3>
		<br>
		<div align="right">
			<a href="{{url('product_atrribute')}}" style=" margin: 0px 45px;" class="btn btn-primary">Add</a>
		</div>
		<table class="table table-bordered">
			<tr>
				
				<th>Product_Attribute</th>
				<th>Product_Attribute_values</th>
				<th>Action</th>
			</tr>

			<?php  
             $default_productid=0;
			?>
			@foreach($data as $row)
			 	<tr>
			 		<?php

                      if($default_productid!=$row->pro_attr_id){ 
                                   $default_productid=$row->pro_attr_id;
                      	   ?>
                         <td>{{$row->proAttrName}}</td>


					            <td>
							            @foreach($data as $inner_row)
							            @if($inner_row->pro_attr_id==$row->pro_attr_id)
							                  {{$inner_row->pro_value}}<br>
							             @endIf
										@endforeach	
								 	   </td>

						<td><a style="margin-bottom: 5px;" class="btn btn-primary" href="{{url('edit_attribute/'.$row->pro_attr_id)}}">EDIT</a>
			 			<form method="post" action="{{url('delete_attribute/'.$row->pro_attr_id)}}" >
			 			{{csrf_field()}}
			 			<input type="hidden" name="del" value="DELETE"/>
			 			<button type="submit" class="btn btn-primary">DELETE</button>
			 		</form>
			 	</td>


                      <?php }

			 		?>
			 		
			 	</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
@endsection