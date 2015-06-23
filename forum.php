<?php get_header(); ?>
<div class="container-fluid">	
	<div class="row">
		<section id="main-content" class="col-md-9">

			<?php 
				while (have_posts()) : the_post();

					if ( get_post_type() == 'forum') {
						if (shortcode_exists( 'bbp-forum-index' )) {
							echo do_shortcode( '[bbp-forum-index]' );
						}
					} else {
						the_content();
					}
				endwhile;
			?>
		</section>
	
		<section id="right-sidebar" class="col-md-3">
			 <?php get_sidebar('forum'); ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>