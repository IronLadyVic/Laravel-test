<?php
//this only exsists in memory, does not exsist in eloquent
class Cart{

	private $aContents;

	public function __construct(){

		$this->aContents = array();
	}

 public function addProduct($iProductID, $iQuantity){
 	
		if(isset($this->aContents[$iProductID]) == false){
			$this->aContents[$iProductID] = $iQuantity;
		}else{
			$this->aContents[$iProductID] += $iQuantity;
		}

	}

 public function removeProduct($iProductID){
	$this->aContents[$iProductID] -= 1;
		if($this->aContents[$iProductID] == 0){
			unset($this->aContents[$iProductID]);
		}

	}
 public function __get($var){
		switch ($var) {
			case 'contents':
				return $this->aContents;
				break;
				default: die($var." empty");
			}
		}
 public function __set($var, $value){
		switch ($var) {
			case "contents":
					$this->aContents = $value;
				break;
				default: die($var." empty");
			}
		}

}


//TESTING

// $oCart = new Cart();

// $oCart->addProduct(2);
// $oCart->addProduct(3);
// $oCart->addProduct(4);
// $oCart->addProduct(4);
// $oCart->addProduct(4);
// $oCart->removeProduct(4);
// $oCart->addProduct(2);
// $oCart->removeProduct(2);

// echo ("<pre>");
// print_r($oCart);
// echo ("</pre>");

?>