<?php
class FilterArray {
	function filter( $result, $allowed ) {
		foreach ( $result as $key => $ar ) {
			$searchArray           = $result[ $key ];
			$finalResult           = array_intersect_key( $searchArray, array_flip( $allowed ) );
			$tmp["karosserie$key"] = $finalResult;
		}

		return ( $tmp );
	}
}