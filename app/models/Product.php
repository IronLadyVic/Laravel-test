<?php 

class Product extends Eloquent{

	//Eloquent maps back to the SQL
	public function type(){
		return $this->belongsTo('Type');	


	}

	public function orders(){
		return $this->belongsToMany('Order');

	}
}


?>