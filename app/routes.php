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

Route::post('users',function(){
	//write seudo code here

	//validate input on form

	$aRules = array(
		//these are attributes
		"username" => "required|unique:users", //now check for unique username in the users table
		"password" => "required|confirmed", //this helps with password confirmation
		"firstname" => "required",
		"lastname" => "required",
		"email" => "required|email|unique:users"
		//factory pattern - similar to javascript layout. You would say these are the property rules in the array
		);
	$aUserInput = Input::all(); //this is the post data
	$messages = array(
		'email' => 'your freaken email is wrong.', //you could use an attribute name sticky data from username to tell the user their email is incorrect attribute:username
		'required' => 'Dont forget :attribute');
	//$_REQUEST -contains all the information, the $_GET the $_DATA.

	$oValidator = Validator::make($aUserInput, $aRules, $messages);

	if($oValidator->fails()){
		//is the validator->fails(true) - so it fails you redirect the user back to the new users form
		//redirect to users/new with sticky data and errors message
		return Redirect::to("users/new")->withErrors($oValidator)
		->withInput(); //this will detect to see what is the current inputs are and pass that on - this is called 'Session Flash' - all framework terms use this
		//1. Input is put in by user
		//2. Validator kicks in
		//3. detects errors in OValidator
		//4. sends back to URL users/new 
	}else{
		//create new user
		$aDetails = Input::all();
		$aDetails["password"] = Hash::make($aDetails["password"]); //hash is in app/config/app.php
		User::create($aDetails);

		return Redirect::to("types/1");
	}

	//if(not valid){
		//redirect to users/new with sticky data and errors message
	//}else{
		//create new user
		//redirect home page
	//}

});

Route::get('users/{id}',function($id){

	$oUser = User::find($id);

	return View::make("userDetails")->with("user", $oUser); //"user" is the object assigned to the varible name $ouser. Every time you call view::user is referring to the object

});