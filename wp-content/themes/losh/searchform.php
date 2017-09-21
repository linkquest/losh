<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'losh' ); ?></label>
		<input type="text" class="field" name="s" id="s"  />
		<button type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'losh' ); ?>" >
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>	</form>

