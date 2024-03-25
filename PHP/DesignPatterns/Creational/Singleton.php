<?php

/*---------------------------------------------- Definition ----------------------------------------------------
Singleton is a creational design pattern that lets you ensure that a class has only one instance, while providing
 a global access point to this instance.
 Reference - https://refactoring.guru/design-patterns/singleton
---------------------------------------------------------------------------------------------------------------*/
class Singleton {

	private static $instance;

	protected $variable;

	protected function __construct( $variable ) {
		$this->variable = $variable;
	}

	public static function getInstance( $variable ) {
		if( !isset( Singleton::$instance ) ) {
			Singleton::$instance = new Singleton( $variable );
		}

		return Singleton::$instance;
	}
}

$obj1 = Singleton::getInstance( 4 );
$obj2 = Singleton::getInstance( 8 );
$obj3 = Singleton::getInstance( 16 );

echo "<pre>";
var_dump( $obj1, $obj2, $obj3 );

/* ----------- OUTPUT ----------------

object(Singleton)#1 (1) {
  ["variable":protected]=>
  int(4)
}
object(Singleton)#1 (1) {
  ["variable":protected]=>
  int(4)
}
object(Singleton)#1 (1) {
  ["variable":protected]=>
  int(4)
}

-----------------------------------------*/

?>