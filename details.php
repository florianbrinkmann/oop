<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
require_once ( 'classes/Karosserie.class.php' );

if ( isset( $_POST ) && ! empty( $_POST ) ) {
	$karosserie   = new Karosserie();
	$wantedValues = [
        'hersteller',
		'automodell',
		'modell_jahr',
		'auto_segment',
		'laenge',
		'breite',
		'hoehe',
		'spurweite_vorne',
		'spurweite_hinten',
		'spurweite_mittel',
		'radstand',
		'reifenkontaktflaeche',
		'vordertueren_gewicht',
		'hinertueren_gewicht',
		'motorhaube_gewicht',
		'heckklappe_gewicht',
        'frontkotfluegel_gewicht ',
		'scharniere_gewicht',
		'tankklappe_gewicht',
		'frontpartie_gewicht',
		'gesamtgewicht',
		'process',
		're_tooling',
		'grad_der_mechanisierung',
		'geplantes_produktionsvolumen',
		'car_body',
		'anzahl_teile_in_der_rohkarosserie',
		'komplette_anzahl_der_teile',
		'anzahl_der_teile_die_leichter_als_100_gramm',
		'anzahl_der_teile_von_100_gramm_bis_zu_1_kilogramm',
		'anzahl_der_teile_von_1_kilogramm_bis_zu_5_kilogram',
		'anzahl_der_teile_ueber_5_kilogramm',
        'stahl',
        'aluminium',
        'magnesium',
        'plastic',
        'anderematerialien'
	];
	$karosserie->setObjectValues();
	$karosserien = $karosserie->getValues( $wantedValues, 'details' );
	$display      = new Anzeige();
	$display->detailView( $karosserien );

} ?>
</body>
</html>