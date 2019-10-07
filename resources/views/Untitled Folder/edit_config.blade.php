@extends('admin.layout')

@section('content')

  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
		<h3 >Update Configuration</h3>
		<br>
      
    <form method="POST" action="{{ url('edit_config/'.$update['id']) }}">
                       	{{csrf_field()}}	

                        <div class="form-group row">
                            <label for="Config_key" class="col-md-4 col-form-label text-md-right">{{ __('Config_key') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('Config_key') is-invalid @enderror" name="Config_key" value="{{ $update['conf_key'] }}" required autocomplete="firstname" autofocus>

                                @error('Config_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                           <div class="form-group row">
                            <label for="Config_value" class="col-md-4 col-form-label text-md-right">{{ __('Config_value') }}</label>
                            <div class="col-md-6">
                                <input id="Config_value" type="text" class="form-control @error('Config_value') is-invalid @enderror" name="Config_value" value="{{ $update['conf_value'] }}" required autocomplete="lastname" autofocus>

                                @error('Config_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                    <input type="radio" name="gender"<?php echo ($update['status']=='0') ?'checked':'' ?>  value="0"> Active<br>
							<input type="radio" name="gender" <?php echo ($update['status']=='1') ?'checked':'' ?>  value="1"> Inactive<br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{url('config_list')}}">Back</a>
                    </form>
                </div>
            </div>

@endsection