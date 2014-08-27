@extends('includes.template')
<!-- . is a slash / -->

@section('content')
<h2>Register New Account</h2>

{{ Form::open(array('url' => 'users')) }}
		

		{{Form::label('username', 'Username');}}
		{{Form::text('username');}}
		<!-- //$errors is already in laravel documentation -->
		{{$errors->first('username','<p class="error">:message</p>')}} <!-- mulitple checks for input ie. submission required and if they re-enter again and its wrong then a second error message pops up -->

		{{Form::label('password', 'Password');}}
		{{Form::text('password');}}
		{{$errors->first('password','<p class="error">:message</p>')}} <!-- //error message is built into laravel - you can change the password as well.. -->

		{{Form::label('confirm_password', 'Confirm Password');}}
		{{Form::text('confirm_password');}}
		{{$errors->first('confirm_password','<p class="error">:message</p>')}}

		{{Form::label('firstname', 'First Name');}}
		{{Form::text('firstname');}}
		{{$errors->first('firstname','<p class="error">:message</p>')}}
	
		{{Form::label('lastname', 'Last Name');}}
		{{Form::text('lastname');}}
		{{$errors->first('lastname','<p class="error">:message</p>')}}

		{{Form::label('email', 'Email');}}
		{{Form::text('email');}}
		{{$errors->first('email','<p class="error">:message</p>')}}

		<input type="reset" value="Reset">
		{{Form::submit('Sign up');}}
	
{{ Form::close() }}

@stop