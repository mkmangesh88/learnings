<?php

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
		echo "This is PHPBook<br>";
	}
}

class SQLBook extends Prototype {
	function __construct() {
		$this->topic = 'SQL';
	}

	public function __clone() {
		echo "This is SQLBook<br>";
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
This is PHPBook
object(PHPBook)#3 (2) {
  ["title":protected]=>
  string(24) "This is title of PHPBook"
  ["topic":protected]=>
  string(3) "PHP"
}
This is SQLBook
object(SQLBook)#4 (2) {
  ["title":protected]=>
  string(24) "This is title of SQLBook"
  ["topic":protected]=>
  string(3) "SQL"
}
------------------------------------------*/
?>