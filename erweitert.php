<!DOCTYPE hmtl>
<head>
	<meta charset="UTF-8"
</head>
<html>
<?php
require_once ( 'classes/Karosserie.class.php' );

$inputArgs = [
	[
		'label' => 'Hersteller',
		'id' => 'oembrand_oemBrand',
		'type' => 'text',
		'placeholder' => 'Hersteller',
		'value' => '',
	],
	[
		'label' => 'Modell',
		'id' => 'carmodel_carModel',
		'type' => 'text',
		'placeholder' => 'Modell',
		'value' => '',
	],
	[
		'label' => 'Modelljahr',
		'id' => 'karosserie_modelYear',
		'type' => 'text',
		'placeholder' => 'Modelljahr',
		'value' => '',
	],
	[
		'label' => 'Car-Segment',
		'id' => 'eurocarsegment_euroCarSegment',
		'type' => 'text',
		'placeholder' => 'Car-Segment',
		'value' => '',
	],
	[
		'label' => 'Länge in Millimetern',
		'id' => 'dimensions_length',
		'type' => 'text',
		'placeholder' => 'Länge in Millimetern',
		'value' => '',
	],
	[
		'label' => 'Breite in Millimetern',
		'id' => 'dimensions_width',
		'type' => 'text',
		'placeholder' => 'Breite in Millimetern',
		'value' => '',
	],
	[
		'label' => 'Höhe in Millimetern',
		'id' => 'dimensions_height',
		'type' => 'text',
		'placeholder' => 'Höhe in Millimetern',
		'value' => '',
	],
	[
		'label' => 'Spurweite vorne in Millimetern',
		'id' => 'dimensions_trackFront',
		'type' => 'text',
		'placeholder' => 'Spurweite vorne in Millimetern',
		'value' => '',
	],
	[
		'label' => 'Spurweite hinten in Millimetern',
		'id' => 'dimensions_trackRear',
		'type' => 'text',
		'placeholder' => 'Spurweite hinten in Millimetern',
		'value' => '',
	],
	[
		'label' => 'Spurweite Mittel in Millimetern',
		'id' => 'dimensions_trackMean',
		'type' => 'text',
		'placeholder' => 'Spurweite Mittel in Millimetern',
		'value' => '',
	],
	[
		'label' => 'Radstand in Millimetern',
		'id' => 'dimensions_wheelbase',
		'type' => 'text',
		'placeholder' => 'Radstand in Millimetern',
		'value' => '',
	],
	[
		'label' => 'Reifenkontaktfläche',
		'id' => 'dimensions_contactArea',
		'type' => 'text',
		'placeholder' => 'Reifenkontaktfläche',
		'value' => '',
	],
	[
		'label' => 'Gewicht Vordertüren in Kilogramm',
		'id' => 'weights_frontDoors',
		'type' => 'text',
		'placeholder' => 'Gewicht Vordertüren in Kilogramm',
		'value' => '',
	],
	[
		'label' => 'Gewicht Hintertüren in Kilogramm',
		'id' => 'weights_rearDoors',
		'type' => 'text',
		'placeholder' => 'Gewicht Hintertüren in Kilogramm',
		'value' => '',
	],
	[
		'label' => 'Gewicht Motorhaube',
		'id' => 'weights_hood',
		'type' => 'text',
		'placeholder' => 'Gewicht Motorhaube',
		'value' => '',
	],
	[
		'label' => 'Gewicht Heckklappe',
		'id' => 'weights_tailgate',
		'type' => 'text',
		'placeholder' => 'Gewicht Heckklappe',
		'value' => '',
	],
	[
		'label' => 'Gewicht Frontkotflügel',
		'id' => 'weights_frontFenders',
		'type' => 'text',
		'placeholder' => 'Gewicht Frontkotflügel',
		'value' => '',
	],
	[
		'label' => 'Gewicht Scharniere',
		'id' => 'weights_hinges',
		'type' => 'text',
		'placeholder' => 'Gewicht Scharniere',
		'value' => '',
	],
	[
		'label' => 'Gewicht Tankklappe',
		'id' => 'weights_fuelFlap',
		'type' => 'text',
		'placeholder' => 'Gewicht Tankklappe',
		'value' => '',
	],
	[
		'label' => 'Gewicht Frontpartie',
		'id' => 'weights_frontEndModules',
		'type' => 'text',
		'placeholder' => 'Gewicht Frontpartie',
		'value' => '',
	],
	[
		'label' => 'Gesamtgewicht',
		'id' => 'weights_totalWeight',
		'type' => 'text',
		'placeholder' => 'Gesamtgewicht',
		'value' => '',
	],
	[
		'label' => 'Prozess',
		'id' => 'process_process',
		'type' => 'text',
		'placeholder' => 'Prozess',
		'value' => '',
	],
	[
		'label' => 'Re-Tooling',
		'id' => 'process_reTooling',
		'type' => 'text',
		'placeholder' => 'Re-Tooling',
		'value' => '',
	],
	[
		'label' => 'Grad der Mechanisierung',
		'id' => 'process_degreeOfMechanisation',
		'type' => 'text',
		'placeholder' => 'Grad der Mechanisierung',
		'value' => '',
	],
	[
		'label' => 'Geplantes Produktionsvolumen',
		'id' => 'process_intendedProductionVolume',
		'type' => 'text',
		'placeholder' => 'Geplantes Produktionsvolumen',
		'value' => '',
	],
	[
		'label' => 'Car-Body',
		'id' => 'process_carBody',
		'type' => 'text',
		'placeholder' => 'Car-Body',
		'value' => '',
	],
	[
		'label' => 'Anzahl Teile in der Rohkarosserie',
		'id' => 'process_partsInTheBodyInWhite',
		'type' => 'text',
		'placeholder' => 'Anzahl Teile in der Rohkarosserie',
		'value' => '',
	],
	[
		'label' => 'Komplette Anzahl der Teile',
		'id' => 'process_totalNumberOfParts',
		'type' => 'text',
		'placeholder' => 'Komplette Anzahl der Teile',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile, die leichter als 100 Gramm sind',
		'id' => 'process_numberOfPartsInWeightClassLessThan100g',
		'type' => 'text',
		'placeholder' => 'Anzahl der Teile, die leichter als 100 Gramm sind',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile von 100 Gramm bis zu 1 Kilogramm',
		'id' => 'process_numberOfPartsInWeightClass100gTo1kg',
		'type' => 'text',
		'placeholder' => 'Anzahl der Teile von 100 Gramm bis zu einem Kilo',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile von 1 Kilogramm bis zu 5 Kilogramm',
		'id' => 'process_numberOfPartsInWeightClass1kgTo5kg',
		'type' => 'text',
		'placeholder' => 'Anzahl der Teile von 1 Kilogramm bis zu 5 Kilogramm',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile über 5 Kilogramm',
		'id' => 'process_numberOfPartsInWeightClassMoreThan5kg',
		'type' => 'text',
		'placeholder' => 'Anzahl der Teile über 5 Kilogramm',
		'value' => '',
	]
];

$formular = new Formular();

$formular->form( 'post', 'erweitert.php', $inputArgs, 'Suchen' );

if ( isset( $_POST ) && ! empty( $_POST ) ) {
	$karosserie      = new Karosserie();
	$wantedValues = [ 'oemBrand', 'carModel', 'modelYear' ];
	$karosserien = $karosserie->getValues( $wantedValues );
	$display = new Anzeige();
	$display->overview( $karosserien );
} ?>
</html>