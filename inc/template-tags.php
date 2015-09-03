<?php
	
	if ( ! function_exists( 'waltzsoft_header')) {
		function waltzsoft_header() { ?>
			<nav class="navbar" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ccs-primary-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<div class="logo pull-left">
							<span class="nms-color">N</span>
							<span>M</span>
							<span class="nms-color">S</span>
						</div>
						<span class="site-title pull-right"><?php bloginfo( 'name' ); ?></span>
					</a>
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div id="ccs-primary-navbar-collapse" class="collapse navbar-collapse">

					<form class="navbar-form navbar-right" role="search" method="get" action="<?php echo home_url(); ?>">
						<div class="form-group">
							<input type="text" name="s" class="form-control" placeholder="Search">
						</div>
						<!-- <button type="submit" class="btn btn-default">Submit</button> -->
					</form>

					<?php 
						$nav_menu = array(
							'theme_location'  => 'primary-menu',
							'menu'            => 'primary-menu',
							'depth'           => 3,
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav navbar-nav navbar-right',
							'fallback_cb'     => 'waltzsubootstrap_navwalker::fallback',
							'walker'          => new waltzsoft_bootstrap_navwalker()
						);
						wp_nav_menu( $nav_menu );
					 ?>
				</div>
			</nav>
		<?php }
	}

	if ( ! function_exists( 'waltzsoft_sidebar_nav' )) {
		function waltzsoft_sidebar_nav() {
			$sidebar_nav = array(
				'theme_location'  => 'sidebar-menu',
				'menu'            => 'sidebar-menu',
				'depth'           => 3,
				'container'       => 'nav',
				'container_class' => 'sibar-nav',
				'container_id'    => 'waltzsoft_sidebar_nav',
			);
			wp_nav_menu( $sidebar_nav );
		}
	}

	if ( ! function_exists('waltzsoft_thumbnail')) {
		function waltzsoft_thumbnail($size) {
			if (! is_single() || has_post_format('image')) :
				$args = array(
					'class' => 'img-responsive center-block'
				);	
			?>
				<?php if ( has_post_thumbnail() ) : ?>
				<figure class="entry-thumbnail"><?php the_post_thumbnail($size, $args); ?></figure>
				<?php else: ?>
				<figure class="entry-thumbnail"><img src="<?php echo get_stylesheet_directory_uri() . '/image/post.png'; ?>" class="attachment-thumbnail wp-post-image img-responsive center-block" alt="default post image" height="150" width="150"></figure>
				<?php endif; ?>
			<?php endif;
		}
	}

	if ( ! function_exists( 'waltzsoft_entry_title' )) {
		function waltzsoft_entry_title() {
			if (is_single() || is_page() ) : ?>
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
			<?php else: ?>
				
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><strong><?php the_title(); ?></strong></a>
				
			<?php endif;
		}
	}

	if (! function_exists('waltzsoft_entry_meta')) {
		function waltzsoft_entry_meta() {
			if (! is_page()) : ?>

				<div class="row entry-meta">
					<div class="col-xs-12 col-sm-4">
						<span class="author">
							<?php _e( 'Posted by: ', 'ccs' ) . the_author_link(); ?>
						</span>
					</div>
					<div class="col-xs-12 col-sm-4">
						<span class="date-published">
							<?php _e( 'Post date: ', 'ccs' ) . the_date(); ?>
						</span>
					</div>
					<div class="col-xs-12 col-sm-4">
						<span class="read-more">
							<a href="<?php the_permalink(); ?>" class="btn btn-primary" alt="<?php the_title(); ?>">
								<?php _e( 'Read more', 'ccs' ); ?>
							</a>
						</span>
					</div>
				</div>
			<?php endif;
		}
	}

	if (! function_exists('waltzsoft_entry_content')) {
		function waltzsoft_entry_content() {
			if ( ! is_single() && ! is_page()) {
				the_excerpt();
			} else {
				the_content();
				// Pagination
				$link_pages = array(
					'before' => __( '<p>Page:', 'ccs' ),
					'after' => '</p>',
					'nextpagelink' => __( 'Next page', 'ccs' ),
					'previouspagelink' => __( 'Previous page', 'ccs' )
				);
				wp_link_pages( $link_pages );

			}
		}
	}

	if ( ! function_exists( 'wp_bs_pagination' ) ) {
		// Bootstrap pagination function
		function wp_bs_pagination( $pages = '', $range = 4 ) {
	     	$showitems = ($range * 2) + 1;  
	     	global $paged;

	     	if( empty( $paged ) ) $paged = 1;
	 
	     	if( $pages == '' ) {
	         	global $wp_query; 
			 	$pages = $wp_query->max_num_pages;
	 
	         	if( ! $pages ) {
	             	$pages = 1;
	         	}
	    	}   
	 
	     	if ( 1 != $pages ) {
	        	echo '<div class="text-center">'; 
	        	echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';
	 
	         	if( $paged > 2 && $paged > $range+1 && $showitems < $pages ) {
	         		echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
	         	}
	 
	         	if ( $paged > 1 && $showitems < $pages ) {
	         		echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";
	         	}
	 
	         	for ( $i = 1; $i <= $pages; $i++ ) {
	             	if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
	                 	echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
	            	}
	        	}
	 
				if ( $paged < $pages && $showitems < $pages ) {
					echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";  
				}

				if ( $paged < $pages-1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) {
					echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
				}

				echo "</ul></nav>";
				echo "</div>";
	     	}
		}
	}

	if (! function_exists('waltzsoft_entry_tag')) {
		function waltzsoft_entry_tag() {
			if (has_tag()) {
				echo '<div class="entry-tag">';
				printf( __( 'Tagged in: %1$s', 'lesson'), get_the_tag_list( '', '') );
				echo '</div>';
			}
		}
	}

	if (! function_exists('waltzsoft_entry_readmore')) {
		function waltzsoft_entry_readmore() {
			return ' ...';
		}
	}
	add_filter( 'excerpt_more', 'waltzsoft_entry_readmore');

	if ( ! function_exists( 'waltzsoft_custom_breadcrumb' )) {
		function waltzsoft_custom_breadcrumb() {
			if(!is_home()) {
				echo '<ol class="breadcrumb">';
				echo '<li><a href="'.get_option('home').'">' . __( 'Home', 'ccs' ) . '</a></li>';
				if (is_single()) {
					echo '<li>';
					the_category(', ');
				echo '</li>';
				if (is_single()) {
					echo '<li>';
					the_title();
					echo '</li>';
				}
			} elseif (is_category()) {
				echo '<li>';
				single_cat_title();
				echo '</li>';
			} elseif (is_page() && (!is_front_page())) {
				echo '<li>';
				the_title();
				echo '</li>';
			} elseif (is_tag()) {
				echo '<li>Tag: ';
				single_tag_title();
				echo '</li>';
			} elseif (is_day()) {
				echo'<li>Archive for ';
				the_time('F jS, Y');
				echo'</li>';
			} elseif (is_month()) {
				echo'<li>Archive for ';
				the_time('F, Y');
				echo'</li>';
			} elseif (is_year()) {
				echo'<li>Archive for ';
				the_time('Y');
				echo'</li>';
			} elseif (is_author()) {
				echo'<li>Author Archives';
				echo'</li>';
			} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
				echo '<li>Blog Archives';
				echo'</li>';
			} elseif (is_search()) {
				echo'<li>Search Results';
				echo'</li>';
			}
				echo '</ol>';
			}
		}
	}

	if (!function_exists('waltzsoft_pagination')) {
		function waltzsoft_pagination() {
			// Khong hien thi phan trang neu it hon 2 trang
			if ($GLOBALS['wp_query'] -> max_num_pages < 2) {
				return '';
			}?>
			<nav role="navigation">
				<ul class="pager">
				<?php if (get_next_posts_link()) :?>
					<li class="previous"> <?php next_posts_link(__('Old Posts', 'ccs')); ?></li>
				<?php endif;?>
				<?php if ( get_previous_posts_link() ) : ?>
			      	<li class="next"><?php previous_posts_link( __('Newer Posts', 'ccs') ); ?></li>
			    <?php endif; ?>
				</ul>
			</nav>
		<?php }
	}

	/**
	 * Render table of post
	 */
	if ( ! function_exists( 'waltzsoft_the_table_posts' ) ) {
		function waltzsoft_the_table_posts( $query_args, $title = 'Table post') {

			// check if have query of query have posts
			if ( ! isset( $query_args ) ) {
				return;
			}

			$query = new WP_Query( $query_args );

			if ( $query->have_posts() ) : ?>

			<div class="page-header">
				<h2><?php echo $title; ?></h2>
			</div>

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
				while ($query->have_posts()) : $query->the_post(); 
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
			?>
				</tbody>
			</table>

			<?php endif;

		}
	}

?>