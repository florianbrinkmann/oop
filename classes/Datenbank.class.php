<?php
class Datenbank {
	/**
	 * Stellt die Verbindung zu einer Datenbank her
	 *
	 * @return PDO
	 */
	function connect() {
		try {
		      $dbh = new PDO( 'mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '' );

			return $dbh;
		} catch ( PDOException $e ) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	/**
	 * Gibt das Array zurück, das die Daten aus der Datenbank enthält
	 *
	 * @return array
	 */
	function select( $view ) {
		/**
		 * Speichert Datenbankverbindung in $dbh
		 */
		$dbh = $this->connect();
		/**
		 * Setzt Variable für WHERE-Bedingung auf einen leeren String
		 */
		$where   = '';
		$counter = 0;
		/**
		 * Foreach-Schleife läuft einmal für jedes übergebene Formularfeld. $key ist die id des Feldes und $values
		 * der eingegebene Wert
		 */
		foreach ( $_POST as $key => $value ) {
			if ( $key == "wantedValues" ) {
				continue;
			}

			if ( $value == ">" || $value == "<" ) {
				continue;
			}

			/**
			 * Wenn die Counter-Variable größer als 0 ist, es also nicht der erste Durchlauf ist, soll ein AND in die
			 * WHERE-Bedingung eingefügt werden
			 */

			if ( $counter === 0 ) {
				$where .= " WHERE ";
			}

			if ( $counter > 0 ) {
				$where .= " AND ";
			}
			/**
			 * Prüft, ob sich bestimmte Zeichen in dem $value-Feld befunden haben und fügt je nachdem das korrekte
			 * Statement in die WHERE-Bedingung ein
			 */
			$greaterThan = strpos( $value, '>' );
			$lessThan = strpos( $value, '<' );
			$between = strpos( $value, '-' );
			if ( $greaterThan !== FALSE ) {
				$value = substr( $value, $greaterThan + 1 );
				$where .= "($key > $value )";
			} elseif ( $lessThan !== FALSE ) {
				$value = substr( $value, $lessThan + 1 );
				$where .= "($key < $value)";
			} elseif ( $between !== FALSE ) {
				$stringLength = strlen( $value );
				$value1 = substr( $value, 0, $between );
				$value2 = substr( $value, $between + 1, $stringLength );
				$where .= "$key BETWEEN '$value1' AND '$value2'";
			} else {
				$where .= "($key LIKE '%$value%' OR $key IS NULL)";
			}
			$counter ++;
		}
		/**
		 * Speichert das SELECT-Statement in $query, schickt es an die Datenbank und speichert das Ergebnis in $result
		 */
		$query  = "SELECT * FROM $view $where";
		$stmt   = $dbh->query( $query );
		$result = $stmt->fetchAll();
		$user = User::get();
		$result = $user->filterList( $result );


		return $result;
	}
}