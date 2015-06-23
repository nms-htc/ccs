<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form role="search" class="form-inline" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">

	<input type="hidden" name="action" value="bbp-search-request" />

	<div class="form-group">
		<label class="sr-only" for="bbp_search"><?php _e( 'Search for:', 'bbpress' ); ?></label>
		<input tabindex="<?php bbp_tab_index(); ?>" 
			class="form-control" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" 
			name="bbp_search" id="bbp_search" placeholder="<?php _e( 'Search forum', 'bbpress' ); ?>">
		
	</div>
</form>
