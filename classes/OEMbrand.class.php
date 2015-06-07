<?php
class OEMbrand {
	var $brandID;
	var $oemBrand;

	function getValues( $wantedValues ) {
		$objectValues = [ 'oemBrand' ];
		$restArray    = array_intersect( $wantedValues, $objectValues );
		if ( $restArray ) {
			foreach ( $restArray as $key => $value ) {
				unset( $wantedValues[ $key ] );
			}
		}
		$db     = new Datenbank();
		$dbh    = $db->connect();
		$result = $db->select( $dbh );

		$values = new FilterArray();
		$values = $values->filter( $result, $restArray );

		return [ 'values' => $values, 'wantedValues' => $wantedValues];
	}
}