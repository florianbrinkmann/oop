<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.js"></script>
	<script src="js/typehead.js"></script>
</head>
<body>
<?php
require_once ( 'classes/Karosserie.class.php' );

$inputArgs = [
	[
		'label' => 'Hersteller',
		'id' => 'hersteller',
		'class' => 'hersteller',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Modell',
		'id' => 'automodell',
		'class' => 'automodell',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Modelljahr',
		'id' => 'modell_jahr',
		'class' => 'modell_jahr',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Car-Segment',
		'id' => 'auto_segment',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Länge in Millimetern',
		'id' => 'laenge',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Breite in Millimetern',
		'id' => 'breite',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Höhe in Millimetern',
		'id' => 'hoehe',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Spurweite vorne in Millimetern',
		'id' => 'spurweite_vorne',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Spurweite hinten in Millimetern',
		'id' => 'spurweite_hinten',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Spurweite Mittel in Millimetern',
		'id' => 'spurweite_mittel',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Radstand in Millimetern',
		'id' => 'radstand',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Reifenkontaktfläche',
		'id' => 'reifenkontaktflaeche',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Vordertüren in Kilogramm',
		'id' => 'vordertueren_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Hintertüren in Kilogramm',
		'id' => 'hintertueren_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Motorhaube',
		'id' => 'motorhaube_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Heckklappe',
		'id' => 'heckklappe_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Frontkotflügel',
		'id' => 'frontkotfluegel_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Scharniere',
		'id' => 'scharniere_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Tankklappe',
		'id' => 'tankklappe_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gewicht Frontpartie',
		'id' => 'frontpartie_gewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Gesamtgewicht',
		'id' => 'gesamtgewicht',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Prozess',
		'id' => 'prozess',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Re-Tooling',
		'id' => 're_tooling',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Grad der Mechanisierung',
		'id' => 'grad_der_mechanisierung',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Geplantes Produktionsvolumen',
		'id' => 'geplantes_produktionsvolumen',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Car-Body',
		'id' => 'car_body',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Anzahl Teile in der Rohkarosserie',
		'id' => 'anzahl_teile_in_der_rohkarosserie',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Komplette Anzahl der Teile',
		'id' => 'komplette_anzahl_der_teile',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile, die leichter als 100 Gramm sind',
		'id' => 'anzahl_der_teile_die_leichter_als_100_gramm',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile von 100 Gramm bis zu 1 Kilogramm',
		'id' => 'anzahl_der_teile_von_100_gramm_bis_zu_1_kilogramm',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile von 1 Kilogramm bis zu 5 Kilogramm',
		'id' => 'anzahl_der_teile_von_1_kilogramm_bis_zu_5_kilogramm',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => 'Anzahl der Teile über 5 Kilogramm',
		'id' => 'anzahl_der_teile_ueber_5_kilogramm',
		'type' => 'text',
		'placeholder' => '',
		'value' => '',
	],
	[
		'label' => '',
		'id' => 'wantedValues',
		'class' => '',
		'type' => 'hidden',
		'placeholder' => '',
		'value' => 'hersteller,automodell,modell_jahr',
	]
];

$formular = new Formular();

$formular->form( 'post', 'erweitert.php', $inputArgs, 'Suchen' ); ?>

<div id="result">
	<noscript>
		<?php include( 'get-result.php' ); ?>
	</noscript>
</div>
<script>

	$( function() {
		var form = $("form").first();
		var getScript = function () {
			$.ajax({
				url: "ajax-json.php", //Relative or absolute path to response.php file
				type: 'post',
				data: $(form).serialize(),
				success: function (data) {
					$( '#script' ).html(data);
				}
			});
		};
		var getData = function () {
			var url = "get-result.php"; // the script where you handle the form input.

			$.ajax({
				type: "POST",
				url: url,
				data: $(form).serialize(), // serializes the form's elements.
				success: function (data) {
					$("#result").html(data); // show response from the php script.
				}
			});

			return false; // avoid to execute the actual submit of the form.
		};
		$('input').on('input', function () {
			getData();
			getScript();
		});
		$('input').bind('typeahead:selected', function () {
			getData();
			getScript();
		});
		$(form).submit(function () {
			var url = "get-result.php"; // the script where you handle the form input.

			$.ajax({
				type: "POST",
				url: url,
				data: $(form).serialize(), // serializes the form's elements.
				success: function (data) {
					$("#result").html(data); // show response from the php script.
				}
			});

			return false; // avoid to execute the actual submit of the form.
		});
	})

</script>
<script>
	$( function() {
		<?php
		/**
		* Hol den Typeahead-Code
		*/
		$karosserieJson   = new Karosserie();
		$karosserieJson->setObjectValues();
		$wantedValuesJson = [ 'hersteller', 'automodell', 'modell_jahr' ];
		$karosserienJson = $karosserieJson->getValues( $wantedValuesJson, 'details' );
		$displayJson     = new Anzeige();
		$displayJson->typeahead( $wantedValuesJson );
		?>
	})
</script>

<div id="script">
	<script>
		<?php

		/**
		 * JSON-Erzeugung beim Laden der Seite!
		 */
		$displayJson->json( $karosserienJson );
		?>
	</script>
</div>
</body>
</html>