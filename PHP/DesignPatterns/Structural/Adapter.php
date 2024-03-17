<?php

class Book {
	protected $name;
	protected $author;

	public function __construct( $name, $author ) {
		$this->name = $name;
		$this->author = $author;
	}

	public function getName() {
		return $this->name;
	}

	public function getAuthor() {
		return $this->author;
	}
}

Class Adapter {

	protected $instanceBook;

	public function __construct( Book $book ) {
		$this->instanceBook = $book;
	}

	public function getBookNameAndAuthor() {
		return 'Book name is <b>' . $this->instanceBook->getName() . ' </b> and Author is <b>' . $this->instanceBook->getAuthor() . '</b>';
	}
}

$objBook = new Book( 'The Alchemist', 'Cohelo Paulo' );

echo 'Book name: ' . $objBook->getName() . '<br />';
echo 'Book author: ' . $objBook->getAuthor() . '<br />';

$objBookAdapter = new Adapter( $objBook );

echo $objBookAdapter->getBookNameAndAuthor();

/* ----------------- OUTPUT ---------------------------
Book name: The Alchemist
Book author: Cohelo Paulo
Book name is The Alchemist and Author is Cohelo Paulo
------------------------------------------------------*/

?>