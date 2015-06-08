<?php
class EuroCarSegment {
	var $shortEuroCarSegment;
	var $euroCarSegment;

	function getObjectValues() {
		$objectValues = [ 'euroCarSegment' ];

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