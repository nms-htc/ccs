<?php

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function richard_theme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'richard_theme_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function richard_theme_jetpack_setup

add_action( 'after_setup_theme', 'richard_theme_jetpack_setup' );

function richard_theme_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function richard_theme_infinite_scroll_render