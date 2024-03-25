<?php

/*---------------------------------------------- Definition ----------------------------------------------------
Abstract Factory is a creational design pattern that lets you produce families of related objects without 
specifying their concrete classes.
Reference - https://refactoring.guru/design-patterns/abstract-factory
---------------------------------------------------------------------------------------------------------------*/

interface VehicleFactory {
	public function createCar( $seats = 0, $model = '' );
	public function createTruck( $length = 0, $tireCount = 0 );
}

interface Car {
	public function getSeats();
	public function getModel();
}

interface Truck {
	public function getLength();
	public function getTireCount();
}


/* Car implement -- Concrete classes*/

class SUV implements Car {

	protected $intSeats;
	protected $strModel;

	public function __construct( $seats = 0, $model = '' ) {
		$this->intSeats = $seats;
		$this->strModel = $model;
	}

	public function getSeats() {
		return $this->intSeats;
	}

	public function getModel() {
		return $this->strModel;
	}
}

class Sedan implements Car {
	protected $intSeats;
	protected $strModel;

	public function __construct( $seats = 0, $model = '' ) {
		$this->intSeats =  $seats;
		$this->strModel = $model;
	}

	public function getSeats() {
		return $this->intSeats;
	}

	public function getModel() {
		return $this->strModel;
	}
}

/* Truck implement -- Concrete classes */

class VintageTruck implements Truck {
	protected $intLength;
	protected $intTireCount;

	public function __construct( $length = 0, $tireCount = 0 ) {
		$this->intLength = $length;
		$this->intTireCount = $tireCount;
	}

	public function getLength() {
		return $this->intLength;
	}

	public function getTireCount() {
		return $this->intTireCount;
	}
}

class ModernTruck implements Truck {
	protected $intLength;
	protected $intTireCount;

	public function __construct( $length = 0, $tireCount = 0  ) {
		$this->intLength = $length;
		$this->intTireCount = $tireCount;
	}

	public function getLength() {
		return $this->intLength;
	}

	public function getTireCount() {
		return $this->intTireCount;
	}
}

class FamilyVehicleFactory implements VehicleFactory {
	public function createCar( $seats = 0, $model = '' ) {
		return new Sedan( $seats, $model );
	}

	public function createTruck( $length = 0, $tireCount = 0 ) {
		return new VintageTruck( $length, $tireCount );
	}
}

class LuxuryVehicleFactory implements VehicleFactory {
	public function createCar( $seats = 0, $model = '' ) {
		return new SUV( $seats, $model );
	}

	public function createTruck( $length = 0, $tireCount = 0 ) {
		return new ModernTruck( $length, $tireCount );
	}
}

echo "<pre>";

$objXFactory = new FamilyVehicleFactory();
$objSedan = $objXFactory->createCar( 5, 'Honda City' );

$objYFactory = new LuxuryVehicleFactory();
$objSUV = $objYFactory->createCar( 7, 'Kia Seltos' );

var_dump( $objSedan, $objSUV );

$objVintage = $objXFactory->createTruck( 45, 6 );
$objModern = $objYFactory->createTruck( 70, 12 );

var_dump( $objVintage, $objModern );


/*------------- OUTPUT ------------------
object(Sedan)#2 (2) {
  ["intSeats":protected]=>
  int(5)
  ["strModel":protected]=>
  string(10) "Honda City"
}
object(SUV)#4 (2) {
  ["intSeats":protected]=>
  int(7)
  ["strModel":protected]=>
  string(10) "Kia Seltos"
}
object(VintageTruck)#5 (2) {
  ["intLength":protected]=>
  int(45)
  ["intTireCount":protected]=>
  int(6)
}
object(ModernTruck)#6 (2) {
  ["intLength":protected]=>
  int(70)
  ["intTireCount":protected]=>
  int(12)
}
------------------------------------------*/

?>