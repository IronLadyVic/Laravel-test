$(function(){

	var clickHandler= function(e){
		e.preventDefault();

		var url = $(this).attr("href"); //we have wrapped this which is  a link to wrap the url around. href is the getter for you of the url
		
		var spinner = new Spinner().spin();
			$(".main").append(spinner.el);

		//this is the ajax request
		$.get(url,function(data){ //response is what the server sends back to you. but its not really a response it is data
			$(".main").empty(); //this will wipe out all content @yeild('content'); so now next step is to put content back in
			$(".main").append(data);

		
		});
	};

	//we have stored the click ajaxify into a variable above. we can store the variable into these functions.
	$("nav a").on("click",clickHandler);
	
	//now ajaxify the pagination	
	$(".pagination a").on("click",clickHandler{



});