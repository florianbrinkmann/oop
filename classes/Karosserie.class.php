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

	function getValues( $wantedValues ) {
		$objectValues = [ 'id', 'modelYear', 'brandID', 'modelID', 'shortEuroCarSegment' ];
		$restArray    = array_intersect( $wantedValues, $objectValues );
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
			$carModel = new CarModel();
			$carModel = $carModel->getValues( $wantedValues );
			$carModelValues = $carModel[ 'values' ];
			$wantedValues = $carModel[ 'wantedValues' ];
			$values   = array_merge_recursive( $carModelValues, $values );
		}
		if ( $wantedValues ) {
			$oemBrand = new OEMbrand();
			$oemBrand = $oemBrand->getValues( $wantedValues );
			$oemBrandValues = $oemBrand[ 'values' ];
			$wantedValues = $oemBrand[ 'wantedValues' ];
			$values   = array_merge_recursive( $oemBrandValues, $values );
		}
		if ( $wantedValues ) {
			$euroCarSegment = new EuroCarSegment();
			$euroCarSegment = $euroCarSegment->getValues( $wantedValues );
			$euroCarSegmentValues = $euroCarSegment[ 'values' ];
			$wantedValues = $euroCarSegment[ 'wantedValues' ];
			$values   = array_merge_recursive( $euroCarSegmentValues, $values );
		}
		if ( $wantedValues ) {
			$dimensions = new Dimensions();
			$dimensions = $dimensions->getValues( $wantedValues );
			$dimensionsValues = $dimensions[ 'values' ];
			$wantedValues = $dimensions[ 'wantedValues' ];
			$values   = array_merge_recursive( $dimensionsValues, $values );
		}
		if ( $wantedValues ) {
			$weights = new Weights();
			$weights = $weights->getValues( $wantedValues );
			$weightsValues = $weights[ 'values' ];
			$wantedValues = $weights[ 'wantedValues' ];
			$values   = array_merge_recursive( $weightsValues, $values );
		}
		if ( $wantedValues ) {
			$process = new Process();
			$process = $process->getValues( $wantedValues );
			$processValues = $process[ 'values' ];
			$values   = array_merge_recursive( $processValues, $values );
		}
		return $values;
	}
}

/*
Die getValues-Funktion holt alle Werte, die auf die $_POST-Parameter passen. Anschließend werden von View (bspw der
index.php) die anderen Klassen der Daten aufgerufen, die dann die übergebenen Parameter aus „ihren“ Daten rausfiltern
*/