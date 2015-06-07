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

	function getValues() {
		$db      = new Datenbank();
		$dbh     = $db->connect();
		$result  = $db->select( $dbh );
		$allowed = [
			'karosserieID',
			'length',
			'width',
			'height',
			'trackFront',
			'trackRear',
			'trackMean',
			'wheelbase',
			'contactArea'
		];
		$values  = new FilterArray();
		$values  = $values->filter( $result, $allowed );

		return $values;
	}
}