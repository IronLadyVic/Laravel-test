<?php

class Type extends Eloquent{

	//lets see how we are going to use this.

	//TEST by going to Route.php by goin to Routes.

	public function products(){
		return $this->hasMany('Product');	
	}



}








?>