<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'single' ) ); ?>>
	<div class="row">
		<div class="col-md-2 col-lg-1 hidden-xs hidden-sm" >
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
				<h3><?php the_author(); ?></h3>
			</div>
			<?php ccs_entry_tag(); ?>
		</div>
		<div class="col-md-10 col-lg-11">
			<header class="entry-header page-header">
				<?php ccs_entry_title(); ?>
			</header>
			<section class="entry-content">
				<?php ccs_entry_content(); ?>
			</section>
		</div>
	</div>
</article>