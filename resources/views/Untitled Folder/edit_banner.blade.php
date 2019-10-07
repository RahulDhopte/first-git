@extends('admin.layout')

@section('content')

  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
		<h3 >Update Banner</h3>
		<br>
      
    <form method="POST" action="{{ url('edit_banner/'.$update['id']) }}" enctype="multipart/form-data">
                       	{{csrf_field()}}	

                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{ $update['Name'] }}" required autocomplete="firstname" autofocus>

                                @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                           <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ $update['Description'] }}"  autocomplete="lastname" autofocus>

                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                           <input type="hidden" name="og_img" value="{{$update['Image']}}">
        					
        					<img style="width: 80px" src="{{asset($path .'/'. $update['Image'])}}">
 							
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
                    <input type="radio" name="status"<?php echo ($update['status']=='active') ?'checked':'' ?>  value="active"> Active<br>
							<input type="radio" name="status" <?php echo ($update['status']=='inactive') ?'checked':'' ?>  value="inactive"> Inactive<br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{url('list_banner')}}">Back</a>
                    </form>
                </div>
            </div>

@endsection