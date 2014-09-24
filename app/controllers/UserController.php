<?php

class UserController extends \BaseController {

	//declare a constructor for the controller
	public function __construct(){

		$this->beforeFilter("auth", array('only'=>array('edit','show', 'update')));
		//apply the filter now so we dont see other users in the system

		// if(there is a login user then apply the authorisation filter){
				//apply beforeFilter() using authorisation from filters.php
		// }
		if(Auth::check()){ //Auth::guest is there then they are a guest and they are True.
			$authorisedID = Request::segment(2);
			$this->beforeFilter("authorisation:".$authorisedID, array('only'=>array('edit','show', 'update')));
		}


	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() //there are controller actions
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() //there are controller actions
	{
		return View::make("newUserForm");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() //there are controller actions
	{
			//validate input on form
		//this would be a POST as it is data being validated to store 
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
		return Redirect::to("users/create")->withErrors($oValidator)
		->withInput(); //this will detect to see what is the current inputs are and pass that on - this is called 'Session Flash' - all framework terms use this
		//1. Input is put in by user
		//2. Validator kicks in
		//3. detects errors in OValidator
		//4. sends back to URL users/new 
	}else{
		//create new user
		$aDetails = Input::all();
		$aDetails["password"] = Hash::make($aDetails["password"]); //hash is in app/config/app.php
		User::create($aDetails); //User has autofill, we need certain fields to be filled (factory pattern)

		return Redirect::to("types/1");
	}

	//if(not valid){
		//redirect to users/new with sticky data and errors message
	//}else{
		//create new user
		//redirect home page
	//}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) //there are controller actions
	{
		//
		$oUser = User::find($id);

		return View::make("userDetails")->with("user", $oUser); //"user" is the object assigned to the varible name $ouser. Every time you call view::user is referring to the object


	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	//allow sticky data to you are able to edit the data
	$oUser = User::find($id);

	return View::make("editUserForm")->with("user", $oUser);
	//now bind one by one for each input
	}


	/**
	 * Update the specified resource in storage. 
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	////this is a update of all data the user edits printed out.
		// return Input::all();

		$sField = Input::get("field");
		$sValue = Input::get("value");

		$oUser = User::find($id);
		$oUser->$sField = $sValue;

		$oUser->save();
		//return value that value is going to be used to be put back into place.

		return $sValue;

	////this is a PUT	
	//validate data
	// $aRules = array(

	// "firstname" => 'required',
	// "lastname" => 'required',
	// "email" => 'required|email|unique:users,email,'.$id);

	// $oValidator = Validator::make(Input::all(),$aRules);

	// if($oValidator->passes()){
	// 	//update user detail

	// 	$oUser = User::find($id);
	// 	$oUser->fill(Input::all());
	// 	$oUser->save();


	// 	//redirect to user page
	// 	return Redirect::to("users/".$id);


	// }else{
	// 	//redirect to editUserDetails with sticky data input and errors
	// 	return Redirect::to('users/'.$id.'/edit')
	// 						->withErrors($oValidator)
	// 							->withInput(); //session flash data (old input)
	// }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
