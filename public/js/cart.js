function makeCart(){
	//variable is also a object

		//initialise an empty cart for when the user is the first time there.
		if(!localStorage["cart"]){ //if this cart doesnt exsist in local storage.nigate it ! = false
			localStorage["cart"] = JSON.stringify({});//{this is an empty object between theempty curly brackets};
			//object->string->localstorage
		};

		var cart = {
				addToCart: function(iProductID){ //this is a key each element contains a function
					//storeing a function inside of a attribute
					var aContents = this.getContents(); //this is cart - this refers to the current object//an associative array is an object
						if(!aContents[iProductID]){//product to add does exsist in cart
							aContents[iProductID] = 1;

						}else{
							aContents[iProductID]+=1; //if i dont have it increase by one
						}
						localStorage["cart"]= JSON.stringify(aContents);
				},
				removeFromCart: function(iProductID){//this is a key
						var aContents = this.getContents();
						
							delete aContents[iProductID];
						

						localStorage["cart"]= JSON.stringify(aContents)
				},

				getContents: function(iProductID){//this is a key
					return JSON.parse(localStorage["cart"]);

				},

	};

	return cart;
};
//an object is an associative array. and object is a data. in javascript function can be thought of as an object. that object is going to be stored into localstorage. in a company you can sync into localstorage.
//this cart class does the syncing as well.
//local storage is good for gamification - way to add usablilty. it remembers where you have been as a user in that application helping you guide through . you turn the experience into a fun thing.
//gamification save the state of the application in localstorage
//aContents holds an associative array which has keys and values. so when we add a product it is held in acontents

//--------------------------testing----------------------//

//var oCart = makeCart();
//oCart.removeFromCart(3);
//oCart.addToCart(2);
// oCart.addToCart(1);

//console.log(oCart.getContents()); 
//getting the content of the cart from localStorage

// this will print out a object

//now we want to add a product id as the key