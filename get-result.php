<?php
require_once ( 'classes/Karosserie.class.php' );
if ( ( isset( $_POST ) )
     && count( array_filter( $_POST ) ) > 1  ) {
	$karosserie   = new Karosserie();
	$wantedValues = explode( ',', $_POST['wantedValues'] );
	$karosserie->setObjectValues();
	$karosserien = $karosserie->getValues( $wantedValues );
	$display     = new Anzeige();
	$display->overview( $karosserien );
}