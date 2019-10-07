@extends('admin.layout')

@section('content')
    <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
        <h3 align="">Update Coupon</h3>
        <br> 
    <form method="POST" action="{{ url('update_coupon/'.$coupon_data[0]->id) }}">
                        {{csrf_field()}}    

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{$coupon_data[0]->code}}" required autocomplete="firstname" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                             <div class="form-group row">
                            <label for="percent_off" class="col-md-4 col-form-label text-md-right">{{ __('Percent_off') }}</label>

                            <div class="col-md-6">
                                <input id="percent_off" type="text" class="form-control @error('percent_off') is-invalid @enderror" name="percent_off" value="{{$coupon_data[0]->percent_off}}" required autocomplete="firstname" autofocus>

                                @error('percent_off')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>          
                             

                        <div class="form-group row">
                            <label for="NO_of_use" class="col-md-4 col-form-label text-md-right">{{ __('NO_of_use') }}</label>

                            <div class="col-md-6">
                                <input id="NO_of_use" type="text" class="form-control @error('NO_of_use') is-invalid @enderror" name="NO_of_use" value="{{$coupon_data[0]->NO_of_use}}" required autocomplete="firstname" autofocus>

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
                                    {{ __('UPDATE') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection