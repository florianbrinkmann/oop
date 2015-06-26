<?php

/**
 * Class Body
 *
 * Nur für die Vererbung zuständig
 */
class Body {
	protected $objectValues;

	protected function getObjectValues( $value ) {
		$this->objectValues = $value;
	}

	protected function getValues( $wantedValues, $restArray ) {
		$db     = new Datenbank();
		$result = $db->select();
		$values = new FilterArray();
		$values = $values->filter( $result, $restArray );

		return [ 'values' => $values, 'wantedValues' => $wantedValues ];
	}
}