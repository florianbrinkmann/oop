<?php
class Formular {
	var $eingabe;

	function form( $formMethod, $formAction, $inputArgs, $submitLabel ) { ?>
		<form method="<?php echo $formMethod; ?>" action="<?php echo $formAction; ?>">
			<?php $this->input( $inputArgs ); ?>
			<input type="submit" value="<?php echo $submitLabel; ?>">
		</form>
	<?php }

	function input( $inputArgs ) {
		foreach ( $inputArgs as $input ) { ?>
			<label for="<?php echo $input['id'] ?>"><?php echo $input['label'] ?></label>
			<input type="<?php echo $input['type'] ?>" id="<?php echo $input['id'] ?>" name="<?php echo $input['id'] ?>"
			       placeholder="<?php echo $input['placeholder'] ?>"
			       value="<?php if ( isset( $_POST[ $input['id'] ] ) ) {
				       echo $_POST[ $input['id'] ];
			       } ?>">
		<?php
		}
	}
}