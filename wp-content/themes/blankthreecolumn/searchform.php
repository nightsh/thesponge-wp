<?php
/**
 * @package WordPress
 * @subpackage Blank Two Column, Left Sidebar
 * @since BTCLS 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" class="field" name="s" id="s"  placeholder="<?php _e('', 'BTCLS') ?>" />
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php _e('search', 'BTCLS'); ?>" />
	</form>