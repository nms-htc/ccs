<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">

		<section id="main-content" class="col-md-9">
			<?php ccs_custom_breadcrumb(); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
			
			<?php 
				if ( comments_open() || get_comment_count() ) : 
					comments_template();
				endif;
			?>
		</section>
	
		<section id="right-sidebar" class="col-md-3">
			 <?php get_sidebar(); ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>