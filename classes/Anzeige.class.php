<?php
class Anzeige {
	function detailView( $values ) {

	}

	function overview( $karosserien ) {
		echo "<br><br>";
		foreach ( $karosserien as $karosserie ) {
			foreach ( $karosserie as $key => $value ) {
				$inputArgs[] = [
					'label'       => '',
					'id'          => $key,
					'type'        => 'text',
					'placeholder' => '',
					'value'       => $value,
					'readonly'    => 'true'
				];
			}
		}
		$formular = new Formular();
		$formular->form( 'post', 'details.php', $inputArgs, 'Details' );

	}
}
