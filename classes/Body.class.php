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

	protected function getValues( $wantedValues, $restArray, $view ) {
		$db     = new Datenbank();
		$result = $db->select( $view );
		$values = new FilterArray();
		$values = $values->filter( $result, $restArray );

		return [ 'values' => $values, 'wantedValues' => $wantedValues ];
	}
}