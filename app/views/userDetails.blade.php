@extends('includes.template')
<!-- . is a slash / -->

@section('content')
	<h2>User Details</h2>

	<h4>Username:</h4>
	<p>{{{$user->username}}}</p> <!-- triple braces for htmlenities-->

	<h4>First name:</h4>
	<p data-editable="firstname">{{{$user->firstname}}}</p>

	<h4>Last name:</h4>
	<p data-editable="lastname">{{{$user->lastname}}}</p>

	<h4>Email:</h4>
	<p data-editable="email">{{{$user->email}}}</p>

	<a href="{{URL::to('users/'.$user->id.'/edit')}}" class="button">Edit details</a>		


@stop

<!-- //we use data-editable to create a attribute and then in main.js turn it into a editable control -->