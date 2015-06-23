<?php 
/**
 * Template Name: Full width
 */
 ?>
<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">
		<section id="main-content" class="col-md-12">
			<?php ccs_custom_breadcrumb(); ?>

			<?php 
				while (have_posts()) : the_post(); 
					get_template_part( 'template-parts/content', 'page' );
				endwhile;
			?>
		</section>
	</div>
</div>

<?php get_footer(); ?>