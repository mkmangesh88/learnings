<?php

//$data = [22, 334, 44, 65, 6, 97, 80, 99, 12, 13, 1, 4, 9, 5, 6, 2, 97]; // Merge Sort

$data = [22, 334, 44, 65, 6, 97, 80, 99, 12, 13, 1, 4, 9, 5, 6, 2, 97, 14, 234, 567, 344]; //Quick Sort

interface Sort {
    public function sortData();
}

class QuickSort implements Sort {

    private $data;
    public function __construct( $data ) {
        $this->data = $data;
    }

    public function sortData() {
        return $this->quickSortAlgo( $this->data );
    }

    public function quickSortAlgo( $data ) {
        $low = $gt = array();
        if( count( $data ) < 2 ) {
            return $data;
        }
        $pivotKey = key( $data );
        $pivot = array_shift( $data );
        foreach( $data as $val ) {
            if( $val <= $pivot ) {
                $low[] = $val;
            }elseif( $val > $pivot ) {
                $gt[] = $val;
            }
        }
        return array_merge( $this->quickSortAlgo( $low ), array( $pivotKey=>$pivot ), $this->quickSortAlgo( $gt ) );
    }

}

class MergeSort implements Sort {

    private $data;
    public function __construct( $data ) {
        $this->data = $data;
    }

    public function sortData() {
        return $this->mergeSortAlgo( $this->data );
    }

    public function mergeSortAlgo( $data ) {
        if(count( $data ) == 1 ) return $data;
        $mid = count( $data ) / 2;
        $left = array_slice( $data, 0, $mid );
        $right = array_slice( $data, $mid );
        $left = $this->mergeSortAlgo( $left );
        $right = $this->mergeSortAlgo( $right );
        return $this->merge( $left, $right );
    }

    public function merge( $left, $right ) {
        $res = array();
        while( count( $left ) > 0 && count( $right ) > 0 ){
            if( $left[0] > $right[0] ){
                $res[] = $right[0];
                $right = array_slice( $right , 1 );
            } else {
                $res[] = $left[0];
                $left = array_slice( $left, 1 );
            }
        }
        while( count( $left ) > 0 ) {
            $res[] = $left[0];
            $left = array_slice( $left, 1 );
        }
        while (count( $right ) > 0 ) {
            $res[] = $right[0];
            $right = array_slice( $right, 1 );
        }
        return $res;
    }

}

function performSort( &$data ) {

    if( count( $data ) > 20 ) {
        echo "QuickSorting";
        $sortingAlgo = new QuickSort( $data );        
    } else {
        echo "MergeSorting";
        $sortingAlgo = new MergeSort( $data );
    }
    return $sortingAlgo->sortData();
}

echo "<pre>";
print_r( $data );

echo PHP_EOL;
echo PHP_EOL;

$res = performSort( $data );

echo "<pre>";
print_r( $res );