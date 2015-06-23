<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'single' ) ); ?>>
	<header class="entry-header page-header">
		<?php ccs_entry_title(); ?>
	</header>
	<section class="entry-content">
		<?php ccs_entry_content(); ?>
	</section>
</article>