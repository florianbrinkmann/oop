<?php
require_once ( 'classes/Karosserie.class.php' );
$karosserieJson   = new Karosserie(); // legt ein neues Karosserie-Objekt an
$wantedValuesJson = explode( ',', $_POST['wantedValues'] );
$karosserieJson->setObjectValues(); // Aufruf der setObjectValues-Methode. Setzt die Werte, auf die die Karosserie-Klasse „zugreifen“ kann
$karosserienJson = $karosserieJson->getValues( $wantedValuesJson ); // holt sich die Werte
$displayJson     = new Anzeige();
$displayJson->typeaheadUpdate( $karosserienJson, $wantedValuesJson );