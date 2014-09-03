@extends('includes.template')
<!-- . is a slash / -->

@section('content')
<h2>{{$type->name}}</h2>
<!-- //$type is the name that we have decided in Route, ->name is from mapping from the database. type has a attribute called name-->
 	@foreach($type->products as $product)
			<article class="group">
			<!-- //you have to create a path for the photo, becuase it is URL now you cant do a query string. -->
				<img src="{{URL::to('product-photo/'.$product->photo)}}" alt="">
				<h4>{{$product->name}}</h4>
				<p>{{$product->description}}</p>
				<span class="price"><i class="icon-dollar"></i>{{$product->price}}</span>

				{{Form::open(array('url'=>'orderlines','class'=>"addCartForm"))}}

				{{Form::hidden("productID",$product->id)}}
				
				<button class="addtocart"><i class="icon-plus"></i></button>
			</article>
	@endforeach			
@stop

<!-- //POST->Orderlines, productID. It is not idempotem-->