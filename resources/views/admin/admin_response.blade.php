@extends('admin.layout')

@section('content')
<h3>Responce Form</h3>
  <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title">Feedback Responce</h3>
    </div>
		<br>
    <form  method="POST" action="{{ url('responce_mail') }}">
                       	{{csrf_field()}}	

                            <div class="box-body">
                            <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email_ID') }}</label>

                            <div class="col-md-6">
                                <input id="email" readonly type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data['email']}}" required autocomplete="firstname" autofocus>
                                <input type="hidden" name="response_id" value="{{$data['id']}}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <input id="message" readonly type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{$data['message']}}" required autocomplete="firstname" autofocus>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="response" class="col-md-4 col-form-label text-md-right">{{ __('Response*') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="content" type="textarea" class="form-control @error('content') is-invalid @enderror" name="content" value=""  autocomplete="firstname" autofocus> -->
                                <textarea style="width: 311px;height: 77px;" name="response" required="required" id="response" rows="5"></textarea>
                                @error('response')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                                <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_review')}}">Back</a>
                            </div>
                        </div>
                    </div>
                       
                        
                    </form>
                </div>
            </div>
        </div>
@endsection
