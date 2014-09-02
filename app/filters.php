<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//you have to apply this to the route.
	// if(there is no cart in session){
	// 	then create cart and store to session

	// }else{

	// }
	if(Session::has("cart")==false){ //or !Session (! = not)::has('cart')
		
		$oCart = new Cart(); //we assume the cart model can be found. otherwise have to find a link to the bootstrap
		//$oCart->addProduct(1,3); //testing
		///$oCart->addProduct(2,2); //testing
		//$oCart->addProduct(5,4);
		Session::put("cart",$oCart);


	}


});



App::after(function($request, $response)
{
	//you have to apply this to the route.
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		//minupulate intended url if HTTP methods are not GET
		if(Request::server("REQUEST_METHOD")=="GET"{
			//asking the server on the request what is the html method you are dealing with here? it is a GET. REcored the current URL ie. users/2. 
			//so once they are logging in and logged in, they are redirected back tothe intended URL.
			Session::put("url.intended",URL::current()); //the intended URL is flash data and saved into the Session

		}else{
			Session::put("url.intended",URL::previous()); //redirect back to the intended

		}

			return Redirect::guest('login');
		}
	}
});

Route::filter('authorisation', function($route, $request, $authorisedID)

{//find out if user is the authorised user if not kick them out//////////////1. Route 2.Request from user 3.authorised is the ID of the user


	if(Auth::user()->id != $authorisedID){
		return Redirect::to('login'); //if they are not a user, then kick them out

	}

	//now apply this filter to the UserController.php
	

});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
