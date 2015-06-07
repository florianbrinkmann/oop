<?php
class EuroCarSegment {
	var $shortEuroCarSegment;
	var $euroCarSegment;

	function getValues() {
		$db      = new Datenbank();
		$dbh     = $db->connect();
		$result  = $db->select( $dbh );
		$allowed = [
			'shortEuroCarSegment',
			'euroCarSegment'
		];
		$values  = new FilterArray();
		$values  = $values->filter( $result, $allowed );

		return $values;
	}
}