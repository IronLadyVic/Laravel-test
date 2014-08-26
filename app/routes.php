<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	// return View::make('hello');


	//returning all the type modals when you test.
	//$oProduct = Product::find(1); //this will find you product no.1 using the id.
		// print_r($oProduct);
	//$oProduct->price = 5; //we have accessed the setter
		//$oProduct->save(); //and saved to the database
	//echo $oProduct->price; //we have accessed the getter

	//there colomn called name and a colomn called price. You can access this name.

	// return Order::all();	

	//return Type::find(5)->products[0]->type; //this will give you the first product of type 1.
		//think about traversing the DOM. Parent, child, siblings..
	// return User::find(1)->orders;	
	// return Order::find(1)->products;	
	
	//return User::find(1)->orders[0]->products[0]->type->name;
	//this is called method chaining.

	//return Product::where("price",">","10")->get(); //you can get all of the products beyond $10.
					//where what

	//this is called query beudo style. based on Fluent query builder. Alot of SQL indirectly.
	//return View::make("type");

});


Route::get('types/{id}',function($id){

	$oType = Type::find($id);

	//binding into Laravel. using with()
	return View::make("type")->with("type",$oType); //"type" is the key word variable you passed in to get oType


});

// get(this is the resource for the URL)
Route::get('users/new',function(){

	return View::make("newUserForm");


});