<?php
include_once ( 'Anzeige.class.php' );
include_once ( 'Body.class.php' );
include_once ( 'Datenbank.class.php' );
include_once ( 'FilterArray.class.php' );
include_once ( 'Formular.class.php' );

function __autoload($class) {
	include_once $class . '.class.php';
}

class Karosserie extends Body {
	function __construct() {
		new CarModel();
		new Dimensions();
		new EuroCarSegment();
		new OEMbrand();
		new Process();
		new Weights();
	}

	/**
	 * Setzt die Karosserie-Werte, die zu der Klasse gehören. Wird aus der index.php aufgerufen
	 */
	function setObjectValues() {
		$this->objectValues = [ 'id', 'modelYear', 'brandID', 'modelID', 'shortEuroCarSegment' ];
	}

	/**
	 * Holt letztlich die Werte und gibt sie zurück
	 *
	 * @param $wantedValues
	 *
	 * @return array|FilterArray
	 */
	function getValues( $wantedValues ) {
		/**
		 * Speicherung der gesuchten Werte als „Backup“, brauchen wir nachher für die Sortierung.
		 * Die Variable $wantedValues wird ja immer weiter dezimiert, bis nichts mehr übrig bleibt
		 */
		$originalWantedValues = $wantedValues;
		/**
		 * Speicherung der Objekt-Werte (aus dem Aufruf der setObjectValues-Methode in der index.php
		 */
		$objectValues         = $this->objectValues;
		/**
		 * Bildet die Schnittmenge zwischen den beiden Arrays $wantedValues und $objectValues. Gibt die Werte zurück,
		 * die von Array1 ($wantedValues) auch in Array2 ($objectValues) vorkommen.
		 */
		$restArray            = array_intersect( $wantedValues, $objectValues );
		/**
		 * Ruft die Methode auf, die $wantedValues gegebenenfalls dezimiert
		 */
		$wantedValues = $this->unsetWantedValues( $restArray, $wantedValues );
		/**
		 * Baut eine Datenbank-Verbindung auf und holt sich die Einträge
		 */
		$db     = new Datenbank();
		$result = $db->select();
		/**
		 * Filtert das Ergebnis nach dem Wert aus $restArray. $values ist jetzt im Fall des Aufrufes aus der index.php
		 *  Array ( [karosserie0] => Array ( [modelYear] => 2014 ) )
		 */
		$values = new FilterArray();
		$values = $values->filter( $result, $restArray );
		/**
		 * Speicherung der Klassennamen in einem Array, damit wir diese mit einer foreach-Schleife durchlaufen können
		 */
		$classes = [ 'CarModel', 'OEMbrand', 'EuroCarSegment', 'Dimensions', 'Weights', 'Process' ];
		foreach ( $classes as $class ) {
			/**
			 * Prüft, ob noch Werte gefunden werden müssen
			 */
			if ( $wantedValues ) {
				/**
				 * Erzeugt ein neues Objekt der gerade „aktiven“ Klasse und setzt die ObjectValues (genau wie in der
				 * index.php
				 */
				$class = new $class;
				$class->setObjectValues();
				$classObjectValues = $class->objectValues;
				$restArray         = array_intersect( $wantedValues, $classObjectValues );
				$wantedValues      = $this->unsetWantedValues( $restArray, $wantedValues );
				/**
				 * Wenn das $restArray nicht dem Array $wantedValues entspricht und es nicht leer ist, dann soll
				 * das Objekt die Werte aus der Datenbank holen
				 *
				 * Wenn $restArray und das dezimierte $wantedValues gleich sind, dann wurde keine Übereinstimmung bei
				 * dem Aufruf der intersect-Methode gefunden
				 */
				if ( $restArray != $wantedValues && ! empty ( $restArray ) ) {
					/**
					 * Holt sich die Werte zurück.
					 */
					$class        = $class->getValues( $wantedValues, $restArray );
					/**
					 * Speichert einen Teil des Arrays mit dem Schlüssen „values“
					 */
					$classValues  = $class['values'];
					$wantedValues = $class['wantedValues'];
					/**
					 * Fügt das Ergebnis aus dem aktuellen Klassen-Durchlauf ($classValues) zusammen mit den vorherigen
					 * Ergebnissen ($values)
					 */
					$values       = array_merge_recursive( $classValues, $values );
				}

			}
		}
		$counter = 0;
		/**
		 * Sortiert das Array nach der Reihenfolge des Arrays $originalWantedValues
		 */
		foreach ( $values as $value ) {
			$value                        = $this->sortArrayByArray( $value, $originalWantedValues );
			$values["karosserie$counter"] = $value;
			$counter ++;
		}

		return $values;
	}

	/**
	 * Wenn $restArray einen Wert hat, dann wird der Eintrag (oder die Einträge) aus dem Array $wantedValues
	 * gelöscht, da wir es ja aus der aktuellen Klasse (Karosserie) bekommen können.
	 * Beim Aufruf aus der index.php ist $restArray beispielsweise  Array ( [2] => modelYear ). Weil wir
	 * $modelYear aus der Karosserie-Tabelle bekommen können, brauchen wir es nicht mehr im $wantedValues-Array
	 *
	 * @return array
	 */
	function unsetWantedValues( $restArray, $wantedValues ) {
		if ( $restArray ) {
			foreach ( $restArray as $key => $value ) {
				unset( $wantedValues[ $key ] );
			}
		}
		return $wantedValues;
	}

	function sortArrayByArray( Array $array, $originalWantedValues ) {
		$ordered = array();
		foreach ( $originalWantedValues as $key ) {
			if ( array_key_exists( $key, $array ) ) {
				$ordered[ $key ] = $array[ $key ];
				unset( $array[ $key ] );
			}
		}

		return $ordered + $array;
	}
}

/*
Die getValues-Funktion holt alle Werte, die auf die $_POST-Parameter passen. Anschließend werden von View (bspw der
index.php) die anderen Klassen der Daten aufgerufen, die dann die übergebenen Parameter aus „ihren“ Daten rausfiltern
*/
