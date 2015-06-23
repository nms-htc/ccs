<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">
		<section id="main-content" class="col-xs-12">
			<?php 
				ccs_custom_breadcrumb();
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'single' );
				endwhile;

				if ( comments_open() || get_comment_count() ) :
					comments_template();
				endif;
			?>
		</section>
	</div>
</div><!-- end .container -->

<?php get_footer(); ?>