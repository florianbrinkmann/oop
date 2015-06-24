<?php
require_once ( 'classes/Karosserie.class.php' );
if ( ( isset( $_POST ) )
     && count( array_filter( $_POST ) ) > 1  ) {
	$karosserie   = new Karosserie(); // legt ein neues Karosserie-Objekt an
	$wantedValues = explode( ',', $_POST['wantedValues'] ); // das sind die Werte, die wir nachher ausgeben möchten
	$karosserie->setObjectValues(); // Aufruf der setObjectValues-Methode. Setzt die Werte, auf die die Karosserie-Klasse „zugreifen“ kann
	$karosserien = $karosserie->getValues( $wantedValues ); // holt sich die Werte
	$display     = new Anzeige();
	$display->overview( $karosserien ); // Anzeigen der zurückerhaltenen Karosserien
}