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

	function getObjectValues() {
		$objectValues = [
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