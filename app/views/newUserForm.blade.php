@extends('includes.template')
<!-- . is a slash / -->

@section('content')
<h2>Register New Account</h2>

{{ Form::open(array('url' => 'users')) }}
		

		{{Form::label('username', 'Username');}}
		{{Form::text('username');}}
		{{Form::label('password', 'Password');}}
		{{Form::text('password');}}
		{{Form::label('confirm_Password', 'Confirm Password');}}
		{{Form::text('confirm_Password');}}
		{{Form::label('firstName', 'First Name');}}
		{{Form::text('firstName');}}
		{{Form::label('lastName', 'Last Name');}}
		{{Form::text('lastName');}}
		{{Form::label('email', 'Email');}}
		{{Form::text('email');}}
		<input type="reset" value="Reset">
		{{Form::submit('Sign up');}}
	
{{ Form::close() }}

@stop