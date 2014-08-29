@extends('includes.template')
<!-- . is a slash / -->

@section('content')
<h2>Edit User Details</h2>

{{ Form::model($user, array('url' => 'users/'.$user->id, 'method'=>'put')) }} <!--use Form::model it will know to map to the user model-->
<!-- add in the user id into the PUT method - viewSource: laravel simulates the PUT method for you. YOu can do ajax to do a native PUT/GET/POST/DELETE <input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" -->
		

		{{Form::label('username', 'Username');}}
		{{Form::text('username', $user->username, array(
			'disabled'=>'disabled'))}}  <!-- //disables this text input 1st feild is the controller, 2nd is default value 3rd is the attribute-->
		<!-- //$errors is already in laravel documentation -->
		{{$errors->first('username','<p class="error">:message</p>')}} <!-- mulitple checks for input ie. submission required and if they re-enter again and its wrong then a second error message pops up -->

		{{Form::label('firstname', 'First Name');}}
		{{Form::text('firstname');}}
		{{$errors->first('firstname','<p class="error">:message</p>')}}
	
		{{Form::label('lastname', 'Last Name');}}
		{{Form::text('lastname');}}
		{{$errors->first('lastname','<p class="error">:message</p>')}}

		{{Form::label('email', 'Email');}}
		{{Form::text('email');}}
		{{$errors->first('email','<p class="error">:message</p>')}}

		{{Form::submit('Update');}}
		
	
{{ Form::close() }}

@stop