<?php
require_once ( 'classes/Karosserie.class.php' );
$karosserieJson   = new Karosserie();
/**
 * Man kann nicht einfach zwei Parameter per AJAX übergeben (wir brauchen hier ja die Karosserie-Daten, um den neuen
 * JSON-String zu erzeugen und die gesuchten Werte. Deshalb gibt es im Formular ein hidden-Feld, dass die gesuchten Werte
 * enthält (siehe letztes $inputArgs in der index.php
 * Mit explode erzeugen wir daraus ein Array
 */
$wantedValuesJson = explode( ',', $_POST['wantedValues'] );
$karosserieJson->setObjectValues();
$arrayKeys = array_keys  ( $_POST );
if ( count( array_filter( $arrayKeys ) ) > 4 ) {
	$karosserienJson = $karosserieJson->getValues( $wantedValuesJson, 'details' );
} else {
	$karosserienJson = $karosserieJson->getValues( $wantedValuesJson, 'normal' );
}
$displayJson     = new Anzeige();
$displayJson->typeaheadUpdate( $karosserienJson, $wantedValuesJson );