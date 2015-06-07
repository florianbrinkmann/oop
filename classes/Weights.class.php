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

	function getValues( $wantedValues ) {
		$objectValues = [
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