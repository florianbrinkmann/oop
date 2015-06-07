<?php
require_once ( 'classes/Karosserie.class.php' );


if ( isset( $_POST ) && ! empty( $_POST ) ) {
	$karosserie   = new Karosserie();
	$wantedValues = [ 'oemBrand', 'carModel', 'modelYear' ];
	$karosserien  = $karosserie->getValues( $wantedValues );
	$display      = new Anzeige();
	$display->overview( $karosserien );
	echo "bla";
}