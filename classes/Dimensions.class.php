<?php
class Dimensions {
	var $karosserieID;
	var $length;
	var $width;
	var $height;
	var $trackFront;
	var $trackRear;
	var $trackMean;
	var $wheelbase;
	var $contactArea;

	function getValues( $wantedValues ) {
		$objectValues = [
			'length',
			'width',
			'height',
			'trackFront',
			'trackRear',
			'trackMean',
			'wheelbase',
			'contactArea'
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