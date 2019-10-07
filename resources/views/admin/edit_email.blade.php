@extends('admin.layout')

@section('content')
<h3>Update Email Form</h3>
  <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title">Update Email Template</h3>
    </div>
		<br>
    <form id="email_validate" method="POST" action="{{ url('update_email/'.$data['id']) }}">
                       	{{csrf_field()}}	

                            <div class="box-body">
                            <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data['title']}}" required autocomplete="firstname" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{$data['subject']}}" required autocomplete="firstname" autofocus>

                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <!-- <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value=""  autocomplete="firstname" autofocus> -->
                                <textarea style="width: 314px;height: 91px;" name="content" value="" required="required"  rows="5">
                                	{{$data['content']}}
                                </textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_email')}}">Back</a>
                            </div>
                        </div>
                    </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
@endsection