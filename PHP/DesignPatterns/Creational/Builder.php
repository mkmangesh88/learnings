<?php

interface ProductBuilder {
	public function createProduct();
	public function setName( $name );
	public function setQuantity( $quantity );
	public function setCost( $cost );
	public function getProduct();
}

class ConcreteBuilder {

	protected $product;

	public function createProduct( $product ) {
		$this->product = $product;
	}

	public function setName( $name ) {
		$this->product->name = $name;
	}

	public function setQuantity( $quantity ) {
		$this->product->quantity = $quantity;
	}

	public function setCost( $cost ) {
		$this->product->cost = $cost;
	}

	public function getProduct() {
		return $this->product;
	}
}

class MobileProduct {
	public $name;
	public $quantity;
	public $cost;
}

class LaptopProduct {
	public $name;
	public $quantity;
	public $cost;
}

class ProductDirector {
	private $director;

	public function __construct( $concreteBuilder ) {
		$this->director = $concreteBuilder;
	}

	public function buildProduct( $product, $name, $quantity, $cost ) {
		$this->director->createProduct( $product );
		$this->director->setName( $name );
		$this->director->setQuantity( $quantity );
		$this->director->setCost( $cost );
		return $this->director->getProduct();
	}
}
$mobileProduct = new MobileProduct();
$laptopProduct = new LaptopProduct();
$concreteBuilder = new ConcreteBuilder();
$productDirector = new ProductDirector( $concreteBuilder );
$product1 = $productDirector->buildProduct( $mobileProduct, 'Samsung Ultra', 45, 120000 );
$product2 = $productDirector->buildProduct( $laptopProduct, 'Lenovo Thinkpad T430', 70, 75000 );

echo "<pre>";
var_dump( $product1, $product2 );

/*----------- OUTPUT ------------------
object(MobileProduct)#1 (3) {
  ["name"]=>
  string(13) "Samsung Ultra"
  ["quantity"]=>
  int(45)
  ["cost"]=>
  int(120000)
}
object(LaptopProduct)#2 (3) {
  ["name"]=>
  string(20) "Lenovo Thinkpad T430"
  ["quantity"]=>
  int(70)
  ["cost"]=>
  int(75000)
}
---------------------------------------*/

?>