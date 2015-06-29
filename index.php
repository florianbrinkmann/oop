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
		'label' => '',
		'id' => 'wantedValues',
		'class' => '',
		'type' => 'hidden',
		'placeholder' => '',
		'value' => 'hersteller,automodell,modell_jahr',
	]
];

$formular = new Formular();

$formular->form( 'post', 'index.php', $inputArgs, 'Suchen' );
?>

<!--
 In diesem div wird von AJAX das Ergebnis ausgegeben. Wenn JavaScript deaktiviert sein sollte, wird die PHP-Datei
 inkludiert und das Formular funktioniert damit weiterhin
 -->
<div id="result">
	<noscript>
		<?php include( 'get-result.php' ); ?>
	</noscript>
</div>
<script>
	$( function() {
		var form = $("form").first();
		/**
		 * Holt sich die aktualisierten JSON-Strings. Übergibt die Werte des Formulars an die ajax-json.php
		 * Schreibt das Ergebnis in das Element mit der ID „script“ (ganz unten)
		 */
		var getScript = function () {
			$.ajax({
				url: "ajax-json.php",
				type: 'post',
				data: $(form).serialize(),
				success: function (data) {
					$( '#script' ).html(data);
				}
			});
		};

		/**
		 * Holt sich die Ergebnisse aus der Datenbank
		 */
		var getData = function () {
			var url = "get-result.php";
			$.ajax({
				type: "POST",
				url: url,
				data: $(form).serialize(),
				success: function (data) {
					$("#result").html(data);
				}
			});
		};

		/**
		 * Führt die Funktionen getData() und getScript() aus, sobald eine Aktion im input-Feld stattfindet
		 */
		$('input').on('input', function () {
			getData();
			getScript();
		});

		/**
		 * Macht dasselbe, wenn mit Enter ein Vorschlag von Typeahead ausgewählt wird
		 */
		$('input').bind('typeahead:selected', function () {
			getData();
			getScript();
		});

		/**
		 * Holt die Ergebnisse, wenn das Formular abgeschickt wird
		 */
		$(form).submit(function () {
			getData();
			return false;
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
		$karosserienJson = $karosserieJson->getValues( $wantedValuesJson, 'normal' );
		$displayJson     = new Anzeige();
		$displayJson->typeahead( $wantedValuesJson );
		?>
	})
</script>

<div id="script">
	<script>
		<?php
		/**
		 * JSON-Erzeugung beim Laden der Seite! Der wird überschrieben, wenn eine Eingabe in dem Formular stattfindet
		 */
		$displayJson->json( $karosserienJson );
		?>
	</script>
</div>
</body>
</html>