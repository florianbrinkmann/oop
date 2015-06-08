<?php
include_once ( 'Anzeige.class.php' );
include_once ( 'CarModel.class.php' );
include_once ( 'Datenbank.class.php' );
include_once ( 'Dimensions.class.php' );
include_once ( 'DirektSuche.class.php' );
include_once ( 'EuroCarSegment.class.php' );
include_once ( 'FilterArray.class.php' );
include_once ( 'Formular.class.php' );
include_once ( 'OEMbrand.class.php' );
include_once ( 'Process.class.php' );
include_once ( 'Weights.class.php' );

class Karosserie {
	var $id;
	var $modelYear;
	var $brandID;
	var $modelID;
	var $shortEuroCarSegment;

	function __construct() {
		new CarModel();
		new Dimensions();
		new EuroCarSegment();
		new OEMbrand();
		new Process();
		new Weights();
	}

	function getObjectValues() {
		$objectValues = [ 'id', 'modelYear', 'brandID', 'modelID', 'shortEuroCarSegment' ];

		return $objectValues;
	}

	function getValues( $wantedValues ) {
		$originalWantedValues = $wantedValues;
		$objectValues         = $this->getObjectValues();
		$restArray            = array_intersect( $wantedValues, $objectValues );
		if ( $restArray ) {
			foreach ( $restArray as $key => $value ) {
				unset( $wantedValues[ $key ] );
			}
		}
		$db     = new Datenbank();
		$dbh    = $db->connect();
		$result = $db->select( $dbh );
		$values = new FilterArray();
		$values = $values->filter( $result, $restArray );
		if ( $wantedValues ) {
			$carModel             = new CarModel();
			$carModelObjectValues = $carModel->getObjectValues();
			$intersect            = new FilterArray();
			$restArray            = $intersect->intersect( $wantedValues, $carModelObjectValues );
			if ( $restArray != $wantedValues && ! empty ( $restArray ) ) {

				$carModel       = $carModel->getValues( $wantedValues, $restArray );
				$carModelValues = $carModel['values'];
				$wantedValues   = $carModel['wantedValues'];
				$values         = array_merge_recursive( $carModelValues, $values );
			}

		}

		if ( $wantedValues ) {
			$oemBrand             = new OEMbrand();
			$oemBrandObjectValues = $oemBrand->getObjectValues();
			$intersect            = new FilterArray();
			$restArray            = $intersect->intersect( $wantedValues, $oemBrandObjectValues );
			if ( $restArray != $wantedValues && ! empty ( $restArray ) ) {

				$oemBrand       = $oemBrand->getValues( $wantedValues, $restArray );
				$oemBrandValues = $oemBrand['values'];
				$wantedValues   = $oemBrand['wantedValues'];
				$values         = array_merge_recursive( $oemBrandValues, $values );
			}

		}

		if ( $wantedValues ) {
			$euroCarSegment             = new EuroCarSegment();
			$euroCarSegmentObjectValues = $euroCarSegment->getObjectValues();
			$intersect                  = new FilterArray();
			$restArray                  = $intersect->intersect( $wantedValues, $euroCarSegmentObjectValues );
			if ( $restArray != $wantedValues && ! empty ( $restArray ) ) {

				$euroCarSegment       = $euroCarSegment->getValues( $wantedValues, $restArray );
				$euroCarSegmentValues = $euroCarSegment['values'];
				$wantedValues         = $euroCarSegment['wantedValues'];
				$values               = array_merge_recursive( $euroCarSegmentValues, $values );
			}

		}

		if ( $wantedValues ) {
			$dimensions             = new Dimensions();
			$dimensionsObjectValues = $dimensions->getObjectValues();
			$intersect              = new FilterArray();
			$restArray              = $intersect->intersect( $wantedValues, $dimensionsObjectValues );
			if ( $restArray != $wantedValues && ! empty ( $restArray ) ) {

				$dimensions       = $dimensions->getValues( $wantedValues, $restArray );
				$dimensionsValues = $dimensions['values'];
				$wantedValues     = $dimensions['wantedValues'];
				$values           = array_merge_recursive( $dimensionsValues, $values );
			}

		}

		if ( $wantedValues ) {
			$weights             = new Weights();
			$weightsObjectValues = $weights->getObjectValues();
			$intersect           = new FilterArray();
			$restArray           = $intersect->intersect( $wantedValues, $weightsObjectValues );
			if ( $restArray != $wantedValues && ! empty ( $restArray ) ) {

				$weights       = $weights->getValues( $wantedValues, $restArray );
				$weightsValues = $weights['values'];
				$wantedValues  = $weights['wantedValues'];
				$values        = array_merge_recursive( $weightsValues, $values );
			}

		}

		if ( $wantedValues ) {
			$process             = new Process();
			$processObjectValues = $process->getObjectValues();
			$intersect           = new FilterArray();
			$restArray           = $intersect->intersect( $wantedValues, $processObjectValues );
			if ( $restArray != $wantedValues && ! empty ( $restArray ) ) {

				$process       = $process->getValues( $wantedValues, $restArray );
				$processValues = $process['values'];
				$values        = array_merge_recursive( $processValues, $values );
			}

		}

		$counter = 0;
		foreach ( $values as $value ) {
			$value                        = $this->sortArrayByArray( $value, $originalWantedValues );
			$values["karosserie$counter"] = $value;
			$counter ++;
		}

		return $values;
	}

	function sortArrayByArray( Array $array, $originalWantedValues ) {
		$ordered = array();
		foreach ( $originalWantedValues as $key ) {
			if ( array_key_exists( $key, $array ) ) {
				$ordered[ $key ] = $array[ $key ];
				unset( $array[ $key ] );
			}
		}

		return $ordered + $array;
	}
}

/*
Die getValues-Funktion holt alle Werte, die auf die $_POST-Parameter passen. Anschließend werden von View (bspw der
index.php) die anderen Klassen der Daten aufgerufen, die dann die übergebenen Parameter aus „ihren“ Daten rausfiltern
*/