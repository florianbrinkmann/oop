<?php
class OEMbrand {
	var $brandID;
	var $oemBrand;

	function getValues() {
		$db      = new Datenbank();
		$dbh     = $db->connect();
		$result  = $db->select( $dbh );
		$allowed = [
			'brandID',
			'oemBrand'
		];
		$values  = new FilterArray();
		$values  = $values->filter( $result, $allowed );

		return $values;
	}
}