<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">
		<section id="main-content" class="col-xs-12">

			<?php 
				echo do_shortcode( '[bbp-single-forum id='. get_the_id() . ']' );
			?>
		</section>
	</div>
</div>

<?php get_footer(); ?>
