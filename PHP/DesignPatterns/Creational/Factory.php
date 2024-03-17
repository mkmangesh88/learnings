<?php
class Factory {

	public static function getFactory( $factoryType ) {

		switch( $factoryType ) {
			case 'reliance':
				return new Reliance();
			case 'airtel':
				return new Airtel();
			case 'vodafone':
				return new Vodafone();
			default:
				return new Reliance();

		}
	}

}

class Reliance {
	public function displayMessage() {
		return 'Reliance brand';
	}
}

class Airtel {
	public function displayMessage() {
		return 'Airtel brand';
	}
}

class Vodafone {
	public function displayMessage() {
		return 'Vodafone brand';
	}
}


$objBrand = Factory::getFactory( 'vodafone' );
echo 'Message : '. $objBrand->displayMessage() . '<br>';

$objBrand = Factory::getFactory( 'reliance' );
echo 'Message : '. $objBrand->displayMessage() . '<br>';

$objBrand = Factory::getFactory( 'airtel' );
echo 'Message : '. $objBrand->displayMessage() . '<br>';

/* ----------------- OUTPUT ------------------------------
Message : Vodafone brand
Message : Reliance brand
Message : Airtel brand
 --------------------------------------------------------*/

?>