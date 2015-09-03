<?php 
	function waltzsoft_plugin_activation() {
		// Khai bao plugin can cai dat
		$plugins = array(
			array(
				'name' => 'Redux Framework',
				'slug' => 'redux-framework',
				'required' => true
			),
			array(
				'name' => 'Auto Post Thumbnail',
				'slug' => 'auto-post-thumbnail',
				'required' => false
			),
			array(
				'name' => 'TinyMCE Advanced',
				'slug' => 'tinymce-advanced',
				'required' => true
			),
			array(
				'name' => 'Wordpress Importer',
				'slug' => 'wordpress-importer',
				'required' => false
			),
			array(
				'name' => 'WP User Avatar',
				'slug' => 'wp-user-avatar',
				'required' => true
			)
		);	
		// Thiet lap TGM
		$configs = array(
			'id' => 'tmgpa',
			'menu' => 'tgmpa_plugin_installs',
			'has_notice' => true,
			'dismissable' => false,
			'is_automatic' => true
		);
		tgmpa( $plugins, $configs );
	}
	add_action( 'tgmpa_register', 'waltzsoft_plugin_activation' );
?>
