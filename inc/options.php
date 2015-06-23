<?php 
	
	if ( ! class_exists( 'ccs_theme_options' ) ) {
		class ccs_theme_options {

			public $args = array();
			public $sections = array();
			public $theme;
			public $ReduxFramework;

			// Load Redux Framework
			public function __construct() {
				if ( ! class_exists( 'ReduxFramework' ) ) {
					return;
				}

				// This is needed. Bah WordPress bugs.😉
				if ( true == Redux_Helpers::isTheme( __FILE__ )) {
					$this->initSettings();
				} else {
					add_action( 'plugins_loaded', array( $this, 'initSettings'), 10);
				}
			}

			/**
			 * Thiet lap cac method muon su dung
			 * Method nao duoc khai bao trong nay cung phai duoc su dung
			 */
			public function initSettings() {

				// Set the default arguments
				$this->setArguments();

				// Set a few help tabs so you can see how it's done.
				$this->setHelpTabs();

				$this->setSections();

				if ( ! isset($this->args['opt_name']) ) { // No errors please
					return;
				}

				$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
			}

			/**
			 * Fuck you.
			 */
			public function setArguments() {
				$theme = wp_get_theme();
				$this->args = array(
					// Cac thiet lap cho trang options.
					'opt_name' => 'c_options',
					'display_name' => $theme->get( 'Name' ),
					'menu_type' => 'menu',
					'allow_sub_menu' => false,
					'menu_title' => __( 'CCS Option', 'ccs'),
					'page_title' => __( 'CCS Option', 'ccs'),
					'dev_mode' => false,
					'customize' => true,
					'menu_icon' => '',
					'hints' => array(
						'icon' => 'icon-question-sign',
						'icon_position' => 'right',
						'icon_color' => 'lightgray',
						'icon_size' => 'normal',
						'tip_style' => array(
							'color' => 'light',
							'shadow' => true,
							'rounded' => false,
							'style' => ''
						),
						'tip_position' => array(
							'my' => 'top left',
							'at' => 'bottom right'
						),
						'tip_effect' => array(
							'show' => array(
								'effect' => 'slide',
								'duration' => '500',
								'event' => 'mouseover'
							),
							'hide' => array(
								'effect' => 'slide',
								'duration' => '500',
								'event' => 'click mouseleaave'
							)
						)
					)
				);

			}

			public function setHelpTabs() {
				// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
			    // $this->args['help_tabs'][] = array(
			    //     'id'      => 'redux-help-tab-1',
			    //     'title'   => __( 'Theme Information 1', 'ccs' ),
			    //     'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'ccs' )
			    // );
			 
			    // $this->args['help_tabs'][] = array(
			    //     'id'      => 'redux-help-tab-2',
			    //     'title'   => __( 'Theme Information 2', 'ccs' ),
			    //     'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'ccs' )
			    // );
			 
			    // // Set the help sidebar
			    // $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'ccs' );
			}

			public function setSections() {
				$this->sections[] = array(
					'title' => __( 'Home page', 'ccs' ),
					'desc' => __( 'All settings for index page for this theme.', 'ccs' ),
					'icon' => 'el-icon-home',
					'fields' => array(
						array(
							'id' => 'index-number-item',
							'type' => 'spinner',
							'title' => __( 'Number items to show', 'ccs' ),
							'desc' => __( 'How many item for each list on index page', 'ccs' ),
							'min' => '5',
							'default' => '10',
							'max' => 50,
							'off' => __( 'Disabled', 'ccs' )
						)
					)
				);
			}

		}

		global $reduxConfig;
		$reduxConfig = new ccs_theme_options();
	}

 ?>