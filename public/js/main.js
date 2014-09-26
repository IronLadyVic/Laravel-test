$(function(){
//the onclick handler is there ready for you on the page, and only runs everytime the page is reloaded.

//     // Bind to StateChange Event//event listener it will listen for the state change event
     History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
     	//will check the state url and return a snippet back into the html
     	//we need to send extra info to the server ie. the cart we will send it across to the server and the server will process the data and return html
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
    }); //bind is attaching the event//we need to now manage the history url state inside the get.

	var clickHandler= function(e){
		e.preventDefault();

		var url = $(this).attr("href"); //we have wrapped this which is  a link to wrap the url around. href is the getter for you of the url
		
		//History.pushState(null,null,url); //this is where we record the state of the data. on this case we are olny instrested in the url.

		var spinner = new Spinner().spin();
			$(".main").append(spinner.el);

			var data = {};
				if(url.indexOf("cart") > -1){ //indexof will serach for the url search key word. it will return an index location. if cart is there - 1
					//then it wil give you back cart from local storage.

					var cart = makeCart(); //factory pattern here
					data = cart.getContents();

				};

				
			

		//this is the ajax request
		$.get(url,data,function(response){ //response is what the server sends back to you. but its not really a response it is data
			$(".main").empty(); // 1. empty //this will wipe out all content @yeild('content'); so now next step is to put content back in
			$(".main").append(response); //2. refresh data/response data can go into brackets....(data)
			//ajax will happen you want a request and then you want the server to respond

		
		});
	};

	//we have stored the click ajaxify into a variable above. we can store the variable into these functions.
	$("nav a").on("click",clickHandler);
	
	//now ajaxify the pagination	
	$(".main").on("click",".pagination a",clickHandler) //event bubbling. your clicking in the inmost box you are also clicking on the outer box. the handler is only on the a. 
		//if a does not have the clickhandler then it reverses up to "main" which has the event handler this is called delegation.
		//main has the event handler but handles the event for the a. we are delegating the event handler on the parent but when you click on the pagination a link

//the fix is you should not add any content later it should not have an event handler. it will miss it. no ajax request                          




//https://github.com/browserstate/history.js	

// (function(window,undefined){

//     // Bind to StateChange Event//event listener it will listen for the state change event
//     History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
//         var State = History.getState(); // Note: We are using History.getState() instead of event.state
//     });

//     // Change our States//you can go back through the state's
//     History.pushState({state:1}, "State 1", "?state=1"); // logs {state:1}, "State 1", "?state=1"
//     History.pushState({state:2}, "State 2", "?state=2"); // logs {state:2}, "State 2", "?state=2"
//     History.replaceState({state:3}, "State 3", "?state=3"); // logs {state:3}, "State 3", "?state=3"
//     History.pushState(null, null, "?state=4"); // logs {}, '', "?state=4"
//     History.back(); // logs {state:3}, "State 3", "?state=3"
//     History.back(); // logs {state:1}, "State 1", "?state=1"
//     History.back(); // logs {}, "Home Page", "?"
//     History.go(2); // logs {state:3}, "State 3", "?state=3"

// })(window);

//when you push a state you are passing in the state of the information. Each state is a url location.
//a state will have name of it, and location of it as well
// every time you click on a link you are recording that state.


//----------------------------------edit user details--------------------------------//

$("[data-editable]").on("click",function(){ //this [data-editiable] is the attribute to p in userDetails.blade.php

	var url = window.location.href; //the current url- so at its current location
	//we want to create a text area using json so user can update details. PUT

	var options={
		//configuration of the control do you want to make a request, put request, a get a post,. we want to do a put to edit something
		//PUT(route) request that goes to user id(method) user/id
		//ajax can do a request natively _PUT laravel thinks it will make a post request. but underneath we want it to be a put request so it goes to the put route
		type: "textarea",
		cssclass: "inserted", //finding out the text area we need. this is putting the class into the form for you.

		submitdata:{
			_method: "PUT",
			field: $(this).data("data-editable") //this is the a created attribute
		},
		submit: "OK"

	};

	$(this).editable(url, options);

});

//----------------------------------wysiwyg--------------------------------//
// tinymce.init({
// 	selector: "textarea"
// });

$(document).on("DOMNodeInserted",function(e){

	//console.log(this); //this is-document.
	//console.log(event.target); //finding out what the target has been inserted in. The target is the form that has the text area.
	if($(e.target).hasClass("inserted")){ //when the class inserted has kicked in to the userdetails form
		console.log(e.target);

		//initialise the textarea in wysywyg, but only inside the class
		
		tineyMCE.editors=[]; //removing any exisiting references

		tinymce.init({
 		selector: ".inserted textarea" //jquery css selector.so when we double click on the userdetails yo uwill have a editable form to edit in your style using tinymce
 		});
	} //taking further action knowing that jeditable kicks in

});

$(".main").on("click","[data-product]",function(){ //just so happens the .main has a click handler so this is data-product on the button
	//delegating here when you click on the add button on type fish your delegating out using the .main
	var iProductId = $(this).attr("data-product");//this always refers to not the object not the main it refers to only in jquery.
	var cart = makeCart();

	cart.addToCart(iProductId); //which is already in localstorage



});

});


//we now need to modify UserController.php to tell if the user updates each feield tell it to update that field.