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
$karosserienJson = $karosserieJson->getValues( $wantedValuesJson );
$displayJson     = new Anzeige();
$displayJson->typeaheadUpdate( $karosserienJson, $wantedValuesJson );