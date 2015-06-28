<?php
require_once ( 'classes/Karosserie.class.php' );
if ( ( isset( $_POST ) )
     && count( array_filter( $_POST ) ) > 1  ) {
	$karosserie   = new Karosserie();
	$wantedValues = explode( ',', $_POST['wantedValues'] );
	$karosserie->setObjectValues();
	$arrayKeys = array_keys  ( $_POST );
	if ( count( array_filter( $arrayKeys ) ) > 4 ) {
		$karosserien = $karosserie->getValues( $wantedValues, 'details' );
	} else {
		$karosserien = $karosserie->getValues( $wantedValues, 'normal' );
	}
	$display     = new Anzeige();
	$display->overview( $karosserien );
}