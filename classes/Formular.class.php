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
		foreach ( $inputArgs as $input ) {
			if ( $input['label'] != '' ) { ?>
				<label for="<?php echo $input['id'] ?>"><?php echo $input['label'] ?></label>
			<?php } ?>
			<input type="<?php echo $input['type'] ?>" id="<?php echo $input['id'] ?>" name="<?php echo $input['id'] ?>"
			       placeholder="<?php echo $input['placeholder'] ?>"
			       value="<?php if ( $input['value'] != '' && ! isset( $_POST[ $input['id'] ] ) ) {
				       echo $input['value'];
			       } elseif ( isset( $_POST[ $input['id'] ] ) ) {
				       echo $_POST[ $input['id'] ];
			       } ?>"<?php if ( $input['readonly'] != '' ) {
				echo "disabled";
			} ?>>
		<?php
		}
	}
}