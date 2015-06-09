<?php
class Datenbank {
	function connect() {
		try {
			$dbh = new PDO( 'mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '' );

			return $dbh;
		} catch ( PDOException $e ) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	function select( $dbh ) {
		$where   = '';
		$counter = 0;
		foreach ( $_POST as $key => $value ) {
			$key = str_replace( '_', '.', $key );
			if ( $counter > 0 ) {
				$where .= " AND ";
			}
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
		$query  = "SELECT * FROM karosserie JOIN carModel ON karosserie.modelID = carModel.modelID JOIN oemBrand ON karosserie.brandID = oemBrand.brandID JOIN euroCarSegment ON karosserie.shortEuroCarSegment = euroCarSegment.shortEuroCarSegment JOIN dimensions ON karosserie.id = dimensions.karosserieID JOIN weights ON karosserie.id = weights.karosserieID JOIN process ON karosserie.id = process.karosserieID WHERE $where";
		$stmt   = $dbh->query( $query );
		$result = $stmt->fetchAll();

		return $result;
	}
}