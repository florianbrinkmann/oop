<?php
require_once ( 'classes/Karosserie.class.php' );

$inputArgs = [
	[
		'label' => 'Hersteller',
		'id' => 'oembrand_oemBrand',
		'type' => 'text',
		'placeholder' => 'Hersteller',
		'value' => ''
	],
	[
		'label' => 'Modell',
		'id' => 'carmodel_carModel',
		'type' => 'text',
		'placeholder' => 'Modell',
		'value' => ''
	],
	[
		'label' => 'Modelljahr',
		'id' => 'karosserie_modelYear',
		'type' => 'text',
		'placeholder' => 'Modelljahr',
		'value' => ''
	]
];

$formular = new Formular();

$formular->form( 'post', 'index.php', $inputArgs, 'Suchen' );

if ( ( isset( $_POST[ 'oembrand_oemBrand' ] ) || isset( $_POST[ 'carmodel_carModel' ] ) || isset( $_POST[ 'karosserie_modelYear' ] ) )
&& ! empty( $_POST[ 'oembrand_oemBrand' ] ) || ! empty( $_POST[ 'carmodel_carModel' ] ) || ! empty( $_POST[ 'karosserie_modelYear' ] ) ) {
	$karosserie      = new Karosserie();
	$karosserieArray = $karosserie->getValues( $_POST );
	$carModel        = new CarModel();
	$carModelArray   = $carModel->getValues( $_POST );
	$finalArray      = array_merge_recursive( $karosserieArray, $carModelArray );
	$display = new Anzeige();
	$display->overview( $finalArray );
}