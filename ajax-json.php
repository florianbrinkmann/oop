<?php
$karosserieJson   = new Karosserie(); // legt ein neues Karosserie-Objekt an
$wantedValuesJson = [ 'oemBrand', 'carModel', 'modelYear' ]; // das sind die Werte, die wir nachher ausgeben möchten
$karosserieJson->setObjectValues(); // Aufruf der setObjectValues-Methode. Setzt die Werte, auf die die Karosserie-Klasse „zugreifen“ kann
$karosserienJson = $karosserieJson->getValues( $wantedValuesJson ); // holt sich die Werte
$displayJson     = new Anzeige();
$displayJson->json( $karosserienJson );