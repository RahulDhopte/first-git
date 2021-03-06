@extends('admin.layout')

@section('content')
<h3>Coupon Form</h3>
    <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="box-header with-border">
        <h3 class="box-title">Add Coupon</h3>
    </div>
        <br>
         <!--  -->
    <form id="coupon_validate" method="POST" action="{{ url('add_coupon/') }}">
                        {{csrf_field()}}    
                        <div class="box-body">
                        <div class="form-group row">
                        <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="" required autocomplete="firstname" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                             <div class="form-group row">
                            <label for="percent_off" class="col-md-4 col-form-label text-md-right">{{ __('Percent off') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input id="percent_off" type="text" class="form-control @error('percent_off') is-invalid @enderror" name="percent_off" value="" required autocomplete="firstname" autofocus>

                                @error('percent_off')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>          
                             

                        <div class="form-group row">
                            <label for="NO_of_use" class="col-md-4 col-form-label text-md-right">{{ __('NO of use') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input id="NO_of_use" type="text" class="form-control @error('NO_of_use') is-invalid @enderror" name="NO_of_use" value="" required autocomplete="firstname" autofocus>

                                @error('NO_of_use')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                                <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_coupon')}}">Back</a>
                            </div>
                        </div>
                    </div>
                        
                    </form>
                </div>
            </div>
        </div>
@endsection