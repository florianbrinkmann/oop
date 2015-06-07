<?php
class Weights {
	var $karosserieID;
	var $frontDoors;
	var $rearDoors;
	var $hood;
	var $tailgate;
	var $frontFenders;
	var $hinges;
	var $fuelFlap;
	var $frontEndModules;
	var $totalWeight;

	function getValues() {
		$db      = new Datenbank();
		$dbh     = $db->connect();
		$result  = $db->select( $dbh );
		$allowed = [
			'karosserieID',
			'frontDoors',
			'rearDoors',
			'hood',
			'tailgate',
			'frontFenders',
			'hinges',
			'fuelFlap',
			'frontEndModules',
			'totalWeight'
		];
		$values  = new FilterArray();
		$values  = $values->filter( $result, $allowed );

		return $values;
	}
}