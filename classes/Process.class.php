<?php
class Process {
	var $karosserieID;
	var $process;
	var $reTooling;
	var $degreeOfMechanisation;
	var $intendedProductionVolume;
	var $carBody;
	var $partsInTheBodyInWhite;
	var $totalNumberOfParts;
	var $numberOfPartsInWeightClassLessThan100g;
	var $numberOfPartsInWeightClass100gTo1kg;
	var $numberOfPartsInWeightClass1kgTo5kg;
	var $numberOfPartsInWeightClassMoreThan5kg;

	function getValues() {
		$db      = new Datenbank();
		$dbh     = $db->connect();
		$result  = $db->select( $dbh );
		$allowed = [
			'karosserieID',
			'process',
			'reTooling',
			'degreeOfMechanisation',
			'intendedProductionVolume',
			'carBody',
			'partsInTheBodyInWhite',
			'totalNumberOfParts',
			'numberOfPartsInWeightClassLessThan100g',
			'numberOfPartsInWeightClass100gTo1kg',
			'numberOfPartsInWeightClass1kgTo5kg',
			'numberOfPartsInWeightClassMoreThan5kg'
		];
		$values  = new FilterArray();
		$values  = $values->filter( $result, $allowed );

		return $values;
	}
}