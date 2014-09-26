@extends('includes.template')
<!-- . is a slash / -->
<!-- do a loop through the div's / -->
<!-- foreach loop has a key and a value / -->

@section('content')
	<h2>Your cart</h2>

	<div class="cart">
			<div>
				<span><h4>Product</h4></span><span><h4>Price</h4></span><span><h4>Quantity</h4></span><span><h4>Subtotal</h4></span>
			</div>
			<?php $fTotal = 0 ?>
			@foreach($cartContents as $key=>$value)	
			<div>
				<span>{{Product::find($key)->name}}</span>
				<span>$ {{Product::find($key)->price}}</span>
				<span>{{$value}}</span>
				<span>$ {{Product::find($key)->price * $value}}</span>
			</div>


			<?php $fTotal += Product::find($key)->price * $value?>
			@endforeach()

			<div>
				<span></span><span></span><span><h4>Total</h4></span><span><h4>$ {{$fTotal}}</h4></span>
			</div>
	</div>
	
	{{Form::open(array('url'=>'orders'))}}
	{{Form::submit("Checkout")}}
	{{Form::close()}}
	

@stop