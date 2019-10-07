@extends('admin.layout')

@section('content')

  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
		<h3 align="">Add Product</h3>
		<br>
		 <!--  -->
    <form method="POST" action="{{ url('update_product/'.$update['id']) }}" enctype="multipart/form-data">
                       	{{csrf_field()}}	

                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{$update['Name']}}" required autocomplete="firstname" autofocus>

                                @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

                            <div class="col-md-6">
                                <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{$update['sku']}}"  autocomplete="firstname" autofocus>

                                @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('Short_description') }}</label>

                            <div class="col-md-6">
                                <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{$update['short_description']}}"  autocomplete="firstname" autofocus>

                                @error('Short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="long_description" class="col-md-4 col-form-label text-md-right">{{ __('Long_description') }}</label>

                            <div class="col-md-6">
                                <input id="long_description" type="text" class="form-control @error('long_description') is-invalid @enderror" name="long_description" value="{{$update['long_description']}}"  autocomplete="firstname" autofocus>

                                @error('Long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$update['price']}}"  autocomplete="firstname" autofocus>

                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="special_price" class="col-md-4 col-form-label text-md-right">{{ __('Special_price') }}</label>

                            <div class="col-md-6">
                                <input id="special_price" type="text" class="form-control @error('special_price') is-invalid @enderror" name="special_price" value="{{$update['special_price']}}" required autocomplete="firstname" autofocus>

                                @error('Special_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="og_img" value="{{$data[0]['Image']}}">
        					
        					<img style="width: 80px" src="{{asset($path .'/'. $data[0]['Image'])}}">
 							
 							<div class="form-group row">
                            <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                            <input name="Image" id="uploadFile" type="file" placeholder="Choose File" class="mandatory_fildes">

                                @error('Image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                               <input type="radio" name="status" <?php echo ($update['status']=='1') ?'checked':'' ?> value="1"> Active<br>
							<input type="radio" name="status" <?php echo ($update['status']=='0') ?'checked':'' ?> value="0"> Inactive<br>
                            </div>
                        </div>

                                      
                            <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{$update['quantity']}}" required autocomplete="firstname" autofocus>

                                @error('Quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_title" class="col-md-4 col-form-label text-md-right">{{ __('Meta_title') }}</label>

                            <div class="col-md-6">
                                <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{$update['meta_title']}}" required autocomplete="firstname" autofocus>

                                @error('Meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta_description') }}</label>

                            <div class="col-md-6">
                                <input id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{$update['meta_description']}}"  autocomplete="firstname" autofocus>

                                @error('Meta_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="meta_keywords" class="col-md-4 col-form-label text-md-right">{{ __('Meta_keywords') }}</label>

                            <div class="col-md-6">
                                <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{$update['meta_keywords']}}" required autocomplete="firstname" autofocus>

                                @error('Meta_keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Meta_status') }}</label>

                            <div class="col-md-6">
                               <input type="radio" name="meta_status" <?php echo ($update['status']=='1') ?'checked':'' ?> value="1"> Active<br>
							<input type="radio" name="meta_status" <?php echo ($update['status']=='0') ?'checked':'' ?> value="0"> Inactive<br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                            	<select name="Category">
                            		<option value="">Select</option>
                            		@foreach($category as $role)
                            		
  									<option value="{{ $role['id'] }}">{{ $role['Name'] }}</option>
  									
 									@endforeach
								</select>
                            </div>
                            </div>  
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection