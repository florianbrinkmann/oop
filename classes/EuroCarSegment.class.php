<?php
class EuroCarSegment {
	var $shortEuroCarSegment;
	var $euroCarSegment;

	function getValues( $wantedValues ) {
		$objectValues = [
			'euroCarSegment'
		];
		$restArray    = array_intersect( $wantedValues, $objectValues );
		if ( $restArray ) {
			foreach ( $restArray as $key => $value ) {
				unset( $wantedValues[ $key ] );
			}
		}
		$db      = new Datenbank();
		$dbh     = $db->connect();
		$result  = $db->select( $dbh );

		$values  = new FilterArray();
		$values  = $values->filter( $result, $restArray );

		return [ 'values' => $values, 'wantedValues' => $wantedValues];
	}
}