<?php get_header(); ?>

<div class="container-fluid">	
	<div class="row">
		
		<section id="main-content" class="col-md-9">	
			<?php if ( is_home() ) : ?>
				<ol class="breadcrumb">
					<li class="active">
						<a href="<?php echo home_url(); ?>">Home</a>
					</li>
				</ol>
			<?php else : ccs_custom_breadcrumb(); endif; ?>
			<div class="page-header">
				<h1>
					<?php 
						if ( is_tag() ) :
							printf( __('Posts Tagged: %1$s', 'ccs'), single_tag_title( '', false ));

						elseif ( is_category() ) :
							printf( __('Posts Categorized: %1$s', 'ccs'), single_cat_title( '', false ));
						elseif ( is_day() ) :
							printf( __('Dayly Archives: %1$s', 'ccs'), get_the_time( 'l, F j, Y' ));
						elseif ( is_month() ) :
							printf( __('Monthly Archives: %1$s', 'ccs'), get_the_time( 'F Y' ));
						elseif ( is_year() ) :
							printf( __('Yearly Archives: %1$s', 'ccs'), get_the_time( 'Y' ));
						endif;
					?>
				</h1>
			</div>
			<?php 
				if (have_posts()) :?>
	
					<table class="table table-hover">
						<thead>
							<tr>
								<th><?php _e( 'Title', 'ccs' );?></th>
								<th><?php _e( 'Author', 'ccs' );?></th>
								<th><?php _e( 'Post date', 'ccs' );?></th>
								<th><?php _e( 'Modified date', 'ccs' );?></th>
								<th><?php _e( 'Categorys', 'ccs' );?></th>
								<th><?php _e( 'Tags', 'ccs' );?></th>
							</tr>
						</thead>
					<tbody>
				<?php 
					while (have_posts()) : the_post(); 
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
				?>
						</tbody>
					</table>
				<?php
					wp_bs_pagination();					
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
		</section>
		<section id="left-sidebar" class="col-md-3">
			<?php get_sidebar(); ?>
		</section>
	</div>
</div><!-- end .container -->

<?php get_footer(); ?>