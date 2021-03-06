@extends('admin.layout')

@section('content')
<h3>Email Form</h3>
  <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
            <div class="box-header with-border">
		<h3 class="box-title">Add Email Template</h3>
    </div>
		<br>
    <form id="email_validate" method="POST" action="{{ url('add_email') }}">
                       	{{csrf_field()}}	

                            <div class="box-body">
                            <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="firstname" autofocus>

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
                                <input  type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="" required autocomplete="firstname" autofocus>

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
                                <!-- <input id="content" type="textarea" class="form-control @error('content') is-invalid @enderror" name="content" value=""  autocomplete="firstname" autofocus> -->
                                <textarea style="width: 314px;height: 91px;" name="content" required="required"  rows="5"></textarea>
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
                                    {{ __('ADD') }}
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
 <!-- <img src="http://127.0.0.1:8000/img/home/logo.png" height="34px" alt=""/>
<h1>Welcome to Eshopper Shopping Cart.</h1>   
<p>    To log in when visiting our site just click  <a href="http://127.0.0.1:8000/">Login</a>  at the top of every page, and then enter your name and password. </p>
<p>Use the following values when prompted to log in:</p> 
<p>Name:- {name}</p>
<p> Password:-{password} </p>  <p>When you log in to your account, you will be able to do the following:</p>                                                                                                                                               
<ul>
<li>Proceed through checkout faster when making a purchase </li>
<li>Check the status of orders</li>
<li>View past orders</li>
<li>Make changes to your account information </li>
<li>Change your password</li>
<li>Store alternative addresses (for shipping to multiple family members and friends!)</li>
</ul>
<p> <a href="http://127.0.0.1:8000/contactUs">Click her</a> or by phone at +91 999999999. </p> -->