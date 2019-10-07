@extends('frontend_view.profile_layout')

@section('content')

  <div style="text-align: center;" class="row justify-content-center">
        <div style="width: 100%;" class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title" style="background: none repeat scroll 0 0 #F0F0E9;color: #363432;margin-bottom: 35px;padding: 10px 25px;font-family: 'Roboto', sans-serif;">Verify Email </h3>
    </div>
		<br>
      
    <form method="POST" action="{{ url('order_status/') }}">
                       	{{csrf_field()}}	

                            <div class="box_body"> 
                              <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email_ID') }}</label>

                            <div style="margin-bottom: 10px;" class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div >

                            <label  for="od_id" class="col-md-4 col-form-label text-md-right">{{ __('Order_ID') }}</label>

                            <div class="col-md-6">
                                <input id="od_id" type="text" class="form-control @error('od_id') is-invalid @enderror" name="od_id" value="" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                          
                        <div style="margin-left: 375px;margin-bottom: 40px;" class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Check') }}
                                </button>
                                <a class="btn btn-primary" href="{{url('profile')}}">Back</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>

@endsection