@extends('frontend_view.profile_layout')

@section('content')
<div class="box">
	<div style="text-align: center;">
		<br>
		<h3 style="background: none repeat scroll 0 0 #F0F0E9;color: #363432;
    margin-bottom: 35px;padding: 10px 25px;font-family: 'Roboto', sans-serif;">Your Profile</h3>
		<br>
		<?php
		if (!empty($user['first_name'])) {
			?>
		 	<p style="font-size:20px; "> Hello {{$user['first_name']}} </p>
		 	<?php
		 } 
		?>
		<?php
		if (!empty($user['last_name'])) {
			?>
		 	<p style="font-size:20px; "> Hello {{$user['last_name']}} </p>
		 	<?php
		 } 
		?>
		<p style="font-size:20px; "> Your email is {{$user['email']}} </p>
		<a style="margin-bottom: 35px;" href="{{url('edit_profile/'.$user['id'])}}" class="btn btn-primary"> Edit Profile </a>
	</div>

</div>
@endsection