<?php if ( ! is_user_logged_in() ) : 
	$current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<aside class="widget panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php _e( 'Login', 'ccs' ) ?></h3>
	</div>
	<div class="panel-body">
		<form id="loginForm" name="loginForm" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
			<div class="form-group">
				<label class="sr-only" for="username"><?php _e( 'User name', 'ccs'); ?></label>
				<input type="text" id="username" class="form-control" name="log" placeholder="<?php _e( 'User', 'ccs'); ?>">
			</div>
			<div class="form-group">
				<label class="sr-only" for="password"><?php _e( 'User name', 'ccs'); ?></label>
				<input type="password" id="password" class="form-control" name="pwd" placeholder="<?php _e( 'Password', 'ccs'); ?>">
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="rememberme">
					<?php _e( 'Remember me', 'ccs'); ?>
				</label>
			</div>
			<div class="form-group">
				<input type="submit" name="wp-submit" class="btn btn-primary" value="<?php _e( 'Login', 'ccs'); ?>"/>
				<input type="hidden" name="redirect_to" value="<?php echo esc_url( $current_url ); ?>">
			</div>
		</form>
	</div>
</aside>	
<?php endif; ?>
<?php if ( has_nav_menu( 'sidebar-menu' ) ) : ?>
<aside class="widget panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php _e( 'Navigator', 'ccs' ) ?></h3>
	</div>
	<div class="panel-body">
		<?php ccs_sidebar_nav(); ?>
	</div>
</aside>
<?php endif; ?>

<?php 
	if (is_active_sidebar( 'sidebar-right' )) {
		dynamic_sidebar( 'sidebar-right' );
	} else {
		_e( 'This is widget area. Go to Appearance --> Widget to add some widget', 'ccs' );
	}
?>
