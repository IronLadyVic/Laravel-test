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

})->before("auth"); //auth this is in laravel. if the auth returns false, there is a user. if it returns true, there is no filter. Ajax.





Route::get('users/{id}/edit',function($id){
	//allow sticky data to you are able to edit the data
	$oUser = User::find($id);

	return View::make("editUserForm")->with("user", $oUser);
	//now bind one by one for each input

})->before("auth");




Route::put('users/{id}',function($id){

	//validate data
	$aRules = array(

	"firstname" => 'required',
	"lastname" => 'required',
	"email" => 'required|email|unique:users,email,'.$id);

	$oValidator = Validator::make(Input::all(),$aRules);

	if($oValidator->passes()){
		//update user detail

		$oUser = User::find($id);
		$oUser->fill(Input::all());
		$oUser->save();


		//redirect to user page
		return Redirect::to("users/".$id);


	}else{
		//redirect to editUserDetails with sticky data input and errors
		return Redirect::to('users/'.$id.'/edit')
							->withErrors($oValidator)
								->withInput(); //session flash data (old input)
	}


})->before("auth");




Route::get('login',function(){

	return View::make("loginForm");


});

Route::post('login',function(){

	$aLoginDetails = array(
		'username'=> Input::get('username'),
		'password' => Input::get('password')
		);

	if(Auth::attempt($aLoginDetails)){ //Auth::attempt($aLoginDetails). Attempt will tell you weather it is true or false. If success login in, Attempt saves that user into the session also.
		//redirect to back to the page that they wanted to go in the first place. ie. shopping cart, but need to login in, user logs in then is redirected back to shopping cart.
			return Redirect::intended("users/".Auth::user()->id); //intended is going to figure out where in the first place the user wanted to go in the first place.
	}else{
		//send back to login page with errors
		return Redirect::to("login")->with("error", "try again!"); //this is flash data, available for the next request. error is stored into the session only for that session.
	}

});

Route::get('logout',function(){

	Auth::logout(); //the user is logged out of the session.

	return Redirect::to("types/1");

});

Route::post('orderlines',function(){

	//get productID

	//Add productID to cart
	Session::get('cart')->addProduct(Input::get("productID"),1); //will give you the session of the shopping cart & Add productID to cart
	//Redirect back to the product page

});


//Tokin, when you ask laravel to submit a form, it injects tokin and protects highjackers - filtering input. It is invisiable to us, but you can see it in view source.


// Route::put('users/{id}',function(){

//tolkin in the SQL. whne you logout the tolkin is saved on that. There is a cookie in the browser and that cookie will be matched to the tolkin in the browser so it rmembers you next time round.

// });

//you can define any filter - identification.
//before filter - check for identification
//after filter - logging in data - you might like to write in data at a certain time. It creates a log for file keeping.

//idempotent: if you keep doing that same thing many times, and you get the same result that is idempotent. 
//If i use put/get/delete(is idempotent) users/1 and firstname= "Mary". and Mary will keep coming up in the server, that is the same result.
//post is not idempotent.

//eg: Logout is a GET - so it is idempotem. google look up restful GET Logout: it is a matter of opinion



//ReSTful URL design

// two base url: collection/element eg: users/1

// some people design in strict hierachy - folder into anther folder into another folder
// helps you separate front end to back end. Ajax, you will do a request to the server, to allow you to separate out the front html and backend.

// If you seperate out, later on it helps with the resources.

// GET // read - users/1/ - this will allow  you to read User id1
// POST // create - insert or add
// PUT // update - edit - users/1/edit - is a ruby on rails convention
// DELETE //delete


// we can map a different operation to a resource.

// our route needs to be a restful convention. so we need to map that out to a resource

// REST does not accomodate the login model.
//use the GET to view the login form and POST to process the data of the login form