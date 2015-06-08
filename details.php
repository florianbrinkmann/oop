<!DOCTYPE hmtl>
<head>
	<meta charset="UTF-8"
</head>
<html>
<?php
require_once ( 'classes/Karosserie.class.php' );

if ( isset( $_POST ) && ! empty( $_POST ) ) {
	$karosserie   = new Karosserie();
	$wantedValues = [
		'oemBrand',
		'carModel',
		'modelYear',
		'euroCarSegment',
		'length',
		'width',
		'height',
		'trackFront',
		'trackRear',
		'trackMean',
		'wheelbase',
		'contactArea',
		'frontDoors',
		'rearDoors',
		'hood',
		'tailgate',
		'frontFenders',
		'hinges',
		'fuelFlap',
		'frontEndModules',
		'totalWeight',
		'process',
		'reTooling',
		'degreeOfMechanisation',
		'intendedProductionVolume',
		'carBody',
		'partsInTheBodyInWhite',
		'totalNumberOfParts',
		'numberOfPartsInWeightClassLessThan100g',
		'numberOfPartsInWeightClass100gTo1kg',
		'numberOfPartsInWeightClass1kgTo5kg',
		'numberOfPartsInWeightClassMoreThan5kg'
	];
	$karosserien  = $karosserie->getValues( $wantedValues );
	$display      = new Anzeige();
	$display->detailView( $karosserien );

} ?>
</html>