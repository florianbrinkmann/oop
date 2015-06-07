<?php
include_once ( 'Anzeige.class.php' );
include_once ( 'CarModel.class.php' );
include_once ( 'Datenbank.class.php' );
include_once ( 'Dimensions.class.php' );
include_once ( 'DirektSuche.class.php' );
include_once ( 'EuroCarSegment.class.php' );
include_once ( 'FilterArray.class.php' );
include_once ( 'MaterialMix.class.php' );
include_once ( 'OEMbrand.class.php' );
include_once ( 'Process.class.php' );
include_once ( 'SuchFormular.class.php' );
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
		new MaterialMix();
		new OEMbrand();
		new Process();
		new Weights();
	}

	function getValues() {
		$db      = new Datenbank();
		$dbh     = $db->connect();
		$result  = $db->select( $dbh );
		$allowed = [ 'id', 'modelYear', 'brandID', 'modelID', 'shortEuroCarSegment' ];
		$values  = new FilterArray();
		$values  = $values->filter( $result, $allowed );

		return $values;
	}
}

/*
Die getValues-Funktion holt alle Werte, die auf die $_POST-Parameter passen. Anschließend werden von View (bspw der
index.php) die anderen Klassen der Daten aufgerufen, die dann die übergebenen Parameter aus „ihren“ Daten rausfiltern
*/