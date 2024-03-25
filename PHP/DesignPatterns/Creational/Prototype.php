<?php

/*---------------------------------------------- Definition ----------------------------------------------------
Prototype is a creational design pattern that lets you copy existing objects without making your code dependent 
on their classes.
 Reference - https://refactoring.guru/design-patterns/prototype
---------------------------------------------------------------------------------------------------------------*/
abstract class Prototype {
	protected $title;
	protected $topic;

	abstract function __clone();

	function setTitle( $title ) {
		$this->title = $title;
	}

	function getTitle() {
		return $this->title;
	}

	function getTopic() {
		$this->topic;
	}
}

class PHPBook extends Prototype {
	function __construct() {
		$this->topic = 'PHP';
	}

	public function __clone() {
		echo "PHPBook clone created.<br>";
	}
}

class SQLBook extends Prototype {
	function __construct() {
		$this->topic = 'SQL';
	}

	public function __clone() {
		echo "SQLBook clone was created.<br>";
	}
}

echo "<pre>";

$objPHPBook = new PHPBook();
$objSQLBook = new SQLBook();

$objPHPBook1 = clone $objPHPBook;
$objPHPBook1->setTitle( 'This is title of PHPBook' );

var_dump( $objPHPBook1);

$objSQLBook1 = clone $objSQLBook;
$objSQLBook1->setTitle( 'This is title of SQLBook' );


 var_dump( $objSQLBook1 );


/*-------------- OUTPUT ------------------
PHPBook clone created.
object(PHPBook)#3 (2) {
  ["title":protected]=>
  string(24) "This is title of PHPBook"
  ["topic":protected]=>
  string(3) "PHP"
}
SQLBook clone was created.
object(SQLBook)#4 (2) {
  ["title":protected]=>
  string(24) "This is title of SQLBook"
  ["topic":protected]=>
  string(3) "SQL"
}
------------------------------------------*/
?>