@extends('admin.layout')

@section('content')

  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
		<h3 >Update Configuration</h3>
		<br>
      
    <form method="POST" action="{{ url('update_category/'.$update['id']) }}">
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
                            <label for="parent_id" class="col-md-4 col-form-label text-md-right">{{ __('Parent_category') }}</label>
                            <div class="col-md-6">
                            	<select name="parent_id">
                            		<option value="">Parent</option>
                            		@foreach($data as $role)
                            		
  									<option value="{{ $role['id'] }}">{{ $role['Name'] }}</option>
  									
 									@endforeach
								</select>
                            </div>
                            </div>  
        

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                    <input type="radio" name="status"<?php echo ($update['status']=='1') ?'checked':'' ?>  value="1"> Active<br>
							<input type="radio" name="status" <?php echo ($update['status']=='0') ?'checked':'' ?>  value="0"> Inactive<br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{url('list_category')}}">Back</a>
                    </form>
                </div>
            </div>

@endsection