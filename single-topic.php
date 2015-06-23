<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">
		<section id="main-content" class="col-xs-12">

			<?php
				while ( have_posts() ) : the_post();
					echo do_shortcode( '[bbp-single-topic id='. get_the_id() . ']' );
				endwhile;
			?>
		</section>
	</div>
</div>

<?php get_footer(); ?>
