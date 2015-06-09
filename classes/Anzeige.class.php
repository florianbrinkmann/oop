<?php
class Anzeige {
	function detailView( $karosserien ) {
		foreach ( $karosserien as $karosserie ) {
			echo "<ul>";
			foreach ( $karosserie as $key => $value ) {
				echo "<li>".$key.": ".$value."</li>";
			}
			echo "</ul>";
		}
	}

	function overview( $karosserien ) {
		echo "<br><br>";
		foreach ( $karosserien as $karosserie ) {
			$inputArgs = [];
			foreach ( $karosserie as $key => $value ) {
				$inputArgs[] = [
					'label'       => $value,
					'id'          => $key,
					'type'        => 'hidden',
					'placeholder' => '',
					'value'       => $value,
				];
			}
			$formular = new Formular();
			$formular->form( 'post', 'details.php', $inputArgs, 'Details' );
		}

	}
}
