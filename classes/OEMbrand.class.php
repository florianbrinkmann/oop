<?phpclass OEMbrand extends Body {	function setObjectValues() {		$this->objectValues = [ 'oemBrand' ];	}	function getValues( $wantedValues, $restArray ) {		$db     = new Datenbank();		$result = $db->select();		$values = new FilterArray();		$values = $values->filter( $result, $restArray );		return [ 'values' => $values, 'wantedValues' => $wantedValues ];	}}