@extends('includes.template')
<!-- . is a slash / -->

@section('content')
<h2>New Product</h2>

{{ Form::open(array('url' => 'products', 'files'=>true)) }} <!--this will tell the form, that the upload data is true-->

		

		{{Form::label('name', 'Name');}}
		{{Form::text('name');}}
		<!-- //$errors is already in laravel documentation -->
		{{$errors->first('username','<p class="error">:message</p>')}} <!-- mulitple checks for input ie. submission required and if they re-enter again and its wrong then a second error message pops up -->
		
		{{Form::label('description', 'Description');}}
		{{Form::text('description');}}
		<!-- //$errors is already in laravel documentation -->
		{{$errors->first('description','<p class="error">:message</p>')}} 

		{{Form::label('photo', 'Photo');}}
		{{Form::file('photo');}}<!-- //file which will help you to upload file photo -->
		<!-- //$errors is already in laravel documentation -->
		{{$errors->first('photo','<p class="error">:message</p>')}} 

		{{Form::label('price', 'Price');}}
		{{Form::text('price');}}
		{{$errors->first('price','<p class="error">:message</p>')}} 
		
		{{Form::label('type_id', 'Type');}}
		{{Form::select('type_id',$types);}}<!-- //pass in the keys and values from documentation -->
		{{$errors->first('type_id','<p class="error">:message</p>')}} 

		
		{{Form::reset('Reset');}}
		{{Form::submit('add product');}}
	
{{ Form::close() }}

@stop