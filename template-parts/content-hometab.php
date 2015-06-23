<?php
	global $c_options;
	$post_number = $c_options[ 'index-number-item' ];

	ccs_the_table_posts( 
		array(
			//Type & Status Parameters
			'post_type'   => 'post',			
			//Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'date',
			'ignore_sticky_posts' => 1,
			
			//Pagination Parameters
			'posts_per_page'         => $post_number,
		), 
		esc_html__( 'Newest Post', 'ccs' ) 
	);

	ccs_the_table_posts( 
		array(
			//Type & Status Parameters
			'post_type'   => 'post',			
			//Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'modified',
			'ignore_sticky_posts' => 1,
			//Pagination Parameters
			'posts_per_page'         => $post_number,
		), 
		esc_html__( 'Modified Post', 'ccs' ) 
	);
?>

