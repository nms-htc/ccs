<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-sx-12 col-sm-5 col-md-3 hidden-xs">
			<?php ccs_thumbnail( '' ); ?>
		</div>
		<div class="col-sx-12 col-sm-7 col-md-9">
			<div class="entry-info clearfix">
				<header class="entry-header">
					<?php ccs_entry_title(); ?>
				</header>
				<section class="entry-content">
					<?php ccs_entry_content(); ?>
					<?php is_single() ? ccs_entry_tag() : ''; ?>
				</section>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<?php ccs_entry_meta(); ?>
		</div>
	</div>
</article>
	