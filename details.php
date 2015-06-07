<?php
require_once ( 'classes/Karosserie.class.php' );

if ( ( isset( $_POST[ 'oembrand_oemBrand' ] ) || isset( $_POST[ 'carmodel_carModel' ] ) || isset( $_POST[ 'karosserie_modelYear' ] ) )
     && ! empty( $_POST[ 'oembrand_oemBrand' ] ) || ! empty( $_POST[ 'carmodel_carModel' ] ) || ! empty( $_POST[ 'karosserie_modelYear' ] ) ) {
	$karosserie      = new Karosserie();
	$karosserieArray = $karosserie->getValues( $_POST );
	$carModel        = new CarModel();
	$carModelArray   = $carModel->getValues( $_POST );
	$karosserien      = array_merge_recursive( $karosserieArray, $carModelArray );
	$display = new Anzeige();
	$display->overview( $karosserien );
}