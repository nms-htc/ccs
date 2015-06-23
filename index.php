<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">
		<section id="main-content" class="col-md-9">
			<ol class="breadcrumb">
				<li class="active">
					<a href="<?php echo home_url(); ?>"><?php _e( 'Home', 'ccs' ); ?></a>
				</li>
			</ol>

			<?php
				$sticky = get_option( 'sticky_posts' );
				$args = array(
					
				);

				global $c_options;
				$post_number = $c_options[ 'index-number-item' ];

				ccs_the_table_posts( 
					array(
						'posts_per_page' => $post_number,
						'post__in'  => $sticky,
						'ignore_sticky_posts' => 1,
					), 
					esc_html__( 'Hot Posts', 'ccs' ) 
				);

				get_template_part( 'template-parts/content', 'hometab' ); 
			?>
			
			
		</section>
	
		<section id="right-sidebar" class="col-md-3">
			 <?php get_sidebar(); ?>
		</section>
	</div>
</div><!-- end .container -->

<?php get_footer(); ?>