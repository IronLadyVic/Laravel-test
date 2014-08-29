@extends('includes.template')
<!-- . is a slash / -->

@section('content')
<h2>Login</h2>

{{ Form::open(array('url' => 'login')) }}
		

		{{Form::label('username', 'Username');}}
		{{Form::text('username');}}
		<!-- //$errors is already in laravel documentation -->
		 
		{{Form::label('password', 'Password');}}
		{{Form::text('password');}}
		 
	
		{{Form::reset('Reset');}}
		{{Form::submit('Log in');}}
	
	{{ Form::close() }}
	{{Session::get("error")}}

@stop