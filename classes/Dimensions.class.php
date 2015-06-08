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

	function getObjectValues() {
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

		return $objectValues;
	}

	function getValues( $wantedValues, $restArray ) {
		$db     = new Datenbank();
		$dbh    = $db->connect();
		$result = $db->select( $dbh );
		$values = new FilterArray();
		$values = $values->filter( $result, $restArray );

		return [ 'values' => $values, 'wantedValues' => $wantedValues ];
	}
}