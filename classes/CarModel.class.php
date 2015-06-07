<?php
class CarModel {
	var $modelID;
	var $carModel;
	function getValues() {
		$db = new Datenbank();
		$dbh = $db->connect();
		$result = $db->select( $dbh );
		$allowed = [ 'modelID', 'carModel' ];
		$values = new FilterArray();
		$values = $values->filter( $result, $allowed );
		return $values;
	}
}