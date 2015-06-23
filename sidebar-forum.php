<?php 
	if (is_active_sidebar( 'sidebar-forum' )) {
		dynamic_sidebar( 'sidebar-forum' );
	} else {
		_e( 'This is widget area. Go to Appearance --> Widget to add some widget', 'ccs' );
	}
?>