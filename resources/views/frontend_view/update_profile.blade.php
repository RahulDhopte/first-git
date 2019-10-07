@extends('frontend_view.profile_layout')

@section('content')

  <div style="text-align: center;" class="row justify-content-center">
        <div style="width: 100%;" class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title" style="background: none repeat scroll 0 0 #F0F0E9;color: #363432;margin-bottom: 35px;padding: 10px 25px;font-family: 'Roboto', sans-serif;">Update Profile</h3>
    </div>
		<br>
      
    <form id="profile_validate" method="POST" action="{{ url('update_profile/'.$update['id']) }}">
                       	{{csrf_field()}}	

                            <div class="box_body"> 
                              <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username*') }}</label>

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
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('FirstName*') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $update['first_name'] }}"  autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                           <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('LastName*') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $update['last_name'] }}"  autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $update['email'] }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                        <div style="margin-left: 375px;margin-bottom: 40px;" class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a class="btn btn-primary" href="{{url('profile')}}">Back</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>

@endsection