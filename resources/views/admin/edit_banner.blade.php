@extends('admin.layout')

@section('content')
<h3>Update Banner Form</h3>
  <div class="box">  
  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title">Update Banner</h3>
    </div>
		<br>
      
    <form id="banner_validate" method="POST" action="{{ url('edit_banner/'.$update['id']) }}" enctype="multipart/form-data">
                       	{{csrf_field()}}	
                        <div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;padding: 10px;" class="box-body">
                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span style="color:red;">*</span></label>

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
                            <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}<span style="color:red;">*</span></label>
                            <div class="col-md-6">
                            <input name="" id="uploadFile" type="file" placeholder="Choose File" class="mandatory_fildes">

                                @error('Image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}<span style="color:red;">*</span></label>

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
                                <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_banner')}}">Back</a>
                            </div>
                        </div>
                    </div>
                        
                    </form>
                </div>
            </div>
        </div>
@endsection