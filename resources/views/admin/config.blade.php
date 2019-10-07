@extends('admin.layout')

@section('content')
<h3>Configuration Form</h3>
  <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title">Add Configuration</h3>
    </div>
		<br>
		 <!--  -->
    <form id="config_validate" method="POST" action="{{ url('add_config/') }}">
                       	{{csrf_field()}}	
                        <div class="box-body">
                        <div class="form-group row">
                            <label for="Config_key" class="col-md-4 col-form-label text-md-right">{{ __('Config key') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('Config_key') is-invalid @enderror" name="Config_key" value="" required autocomplete="firstname" autofocus>

                                @error('Config_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                           <div class="form-group row">
                            <label for="Config_value" class="col-md-4 col-form-label text-md-right">{{ __('Config value') }}<span style="color:red;">*</span></label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('Config_value') is-invalid @enderror" name="Config_value" value="" required autocomplete="lastname" autofocus>

                                @error('Config_value*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>          
                             

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                               <input type="radio" name="gender" value="0"> Active<br>
							<input type="radio" name="gender" value="1"> Inactive<br>
                            </div>
                        </div>
                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                                <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('config_list')}}">Back</a>
                            </div>
                        </div>
                    </div>
                      
                    </form>
                </div>
            </div>
        </div>
@endsection