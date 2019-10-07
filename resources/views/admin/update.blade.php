@extends('admin.layout')

@section('content')
<h3>Update Users Form</h3>
  <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title">Update User</h3>
    </div>
		<br>
      
    <form id="user_validate" method="POST" action="{{ url('update/user/'.$update['id']) }}">
                       	{{csrf_field()}}	


                            <div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;padding: 10px;" class="box_body"> 
                              <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ ('Username') }} <span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $update['username'] }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">FirstName<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $update['first_name'] }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                           <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}<span style="color:red;">*</span></label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $update['last_name'] }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $update['email'] }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

             

                              <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}<span style="color:red;">*</span></label>
                            <div class="col-md-6">
                            	<select name="role">
                                    <?php 
                                    if (empty($role['id'])) {
                                        
                                        ?>
                                        <option value="5">customer</option>
                                        <?php 
                                    }
                                    else{
                                    ?>
                            		<option value="{{$role['id']}}">{{$role['slug']}}</option>
                                <?php }?>
                            		@foreach($role_name as $roles)
  									<option value="{{ $roles['id'] }}">{{ $roles['slug'] }}</option>
 									@endforeach
								</select>
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
                                <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('user/list')}}">Back</a>
                            </div>
                        </div>
                        
                    </div>
                        
                    </form>
                </div>
            </div>
        </div>
@endsection