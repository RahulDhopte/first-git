@extends('admin.layout')

@section('content')
<h3>Update Order Form</h3>
<div class="box">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<br>
			<div class="box-header with-border">
				<h3 class="box-title">Update Order Status</h3>
			</div>
			<br>
			<form  method="POST" action="{{ url('update_order/'.$data['id']) }}">
				{{csrf_field()}}	

				<div class="box-body">
					<div class="form-group row">
						<label for="order_id" class="col-md-4 col-form-label text-md-right">{{ __('Order_id') }}</label>

						<div class="col-md-6">
							<input id="order_id" readonly type="text" class="form-control @error('order_id') is-invalid @enderror" name="order_id" value="{{$data['id']}}" required autocomplete="firstname" autofocus>

							@error('order_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					


					<div class="form-group row">
						<label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
						<div class="col-md-6">
							<select  name="status">
								<option value="Order Placed" <?php echo ($data['Status'] == "Order Placed") ?'Selected':'' ?>>Order Placed</option>
								<option value="Processing" <?php echo ($data['Status'] == "Processing") ?'Selected':'' ?>>Processing</option>
								<option value="Shipped" <?php echo ($data['Status'] == "Shipped") ?'Selected':'' ?>>Shipped</option>
							</select>
						</div>
					</div>

					<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-primary">
							{{ __('Update') }}
						</button>
						<a style="margin-left: 10px;" class="btn btn-primary" href="{{url('order_table')}}">Back</a>
					</div>
				</div>
				</div>
				

			</form>
		</div>
	</div>
</div>
@endsection
