<?php 
/**
 * Template Name: Full width and none title
 */
 ?>
<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">
		<section id="main-content" class="col-xs-12">
			<?php ccs_custom_breadcrumb(); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'single', 'clearfix' ) ); ?>>
					<section class="entry-content">
						<?php ccs_entry_content(); ?>
					</section>
					<section class="entry-comment">
						<?php comments_template(); ?>
					</section>
				</article>
			<?php endwhile; ccs_pagination(); else: get_template_part( 'template-parts/content', 'none' ); endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>