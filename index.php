<?php
require_once ( 'classes/Karosserie.class.php' );

$inputArgs = [
	[
		'label' => 'Hersteller',
		'id' => 'oembrand_oemBrand',
		'type' => 'text',
		'placeholder' => 'Hersteller',
		'value' => '',
		'readonly' => ''
	],
	[
		'label' => 'Modell',
		'id' => 'carmodel_carModel',
		'type' => 'text',
		'placeholder' => 'Modell',
		'value' => '',
		'readonly' => ''
	],
	[
		'label' => 'Modelljahr',
		'id' => 'karosserie_modelYear',
		'type' => 'text',
		'placeholder' => 'Modelljahr',
		'value' => '',
		'readonly' => ''
	]
];

$formular = new Formular();

$formular->form( 'post', 'index.php', $inputArgs, 'Suchen' );

if ( ( isset( $_POST[ 'oembrand_oemBrand' ] ) || isset( $_POST[ 'carmodel_carModel' ] ) || isset( $_POST[ 'karosserie_modelYear' ] ) )
&& ! empty( $_POST[ 'oembrand_oemBrand' ] ) || ! empty( $_POST[ 'carmodel_carModel' ] ) || ! empty( $_POST[ 'karosserie_modelYear' ] ) ) {
	$karosserie      = new Karosserie();
	$wantedValues = [ 'oemBrand', 'carModel', 'modelYear' ];
	$karosserien = $karosserie->getValues( $wantedValues );
	$display = new Anzeige();
	$display->overview( $karosserien );
}