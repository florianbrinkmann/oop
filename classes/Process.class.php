<?php
class Process extends Body {
	function setObjectValues() {
		$this->objectValues = [
			'prozess',
			're_tooling',
			'grad_der_mechanisierung',
			'geplantes_roduktionsvolumen',
			'car_body',
			'anzahl_teile_in_der_rohkarosserie',
			'komplette_anzahl_der_teile',
			'anzahl_der_teile_die_leichter_als_100_gramm',
			'anzahl_der_teile_von_100_gramm_bis_zu_1_kilogramm',
			'anzahl_der_teile_von_1_kilogramm_bis_zu_5_kilogram',
			'anzahl_der_teile_ueber_5_kilogramm'
		];
	}
}