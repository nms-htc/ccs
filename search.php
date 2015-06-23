<?php get_header(); ?>

<div class="container-fluid">
	
	<div class="row">
		<section id="main-content" class="col-md-9">
			<?php ccs_custom_breadcrumb(); ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Search</h3>
				</div>

				<div class="panel-body">
				   
				   <form action="<?php echo home_url(); ?>" method="get" accept-charset="utf-8">
				   	
				   		<div class="form-group">
				   			<label for="keywords"><?php _e( 'Keywords', 'ccs' ) ?></label> 
				   			<input class="form-control" id="keywords" name="s" value="<?php echo esc_html($s); ?>">
				   		</div>

				   		<div class="form-group">
				   			<label for="postCat"><?php _e( 'Category: ', 'ccs') ?></label>
				   			<?php
				   				$default_cat= 0;
				   				if(isset($_GET['cat']))
     								$default_cat =absint($_GET['cat']);

								$show_count          = '1';
								$default_select_text = 'Any Category';
								$show_hierarchy      = '1';
								$cat_args            = array(
										'selected'        => $default_cat,
										'show_count'      => $show_count, 
										'hierarchical'    => $show_hierarchy,
										'show_option_all' => $default_select_text,
										'echo'            => 0,
										'id'              => 'searchform_cat',
										'orderby'         => 'name',
										'order'           => 'asc',
										'class'           => 'form-control',
		   						);
		   						echo wp_dropdown_categories($cat_args);
				   			?>
				   		</div>
				   		<div class="form-group">
				   			<button type="submit" class="btn btn-primary"><?php echo esc_html__( 'Search', 'ccs' );?></button>
				   		</div>
				   </form>
				</div>
			</div>

			<div class="search-info">
				<?php
		            $search_query = new WP_Query( 's='.$s.'&showposts=-1&cat=' .$default_cat );
		            $search_keyword = esc_html( $s );
		            $search_count = $search_query->post_count;
		            // var_dump( $search_query );
		            printf( __('<p class="alert alert-info">Search results for <strong>\'%1$s\'</strong> in category <strong>\'%2$s\'</strong>. We found <strong>%3$s</strong> articles for you. </p>', 'ccs'),
		            	$search_keyword,
		            	get_cat_name( $default_cat ),
		            	$search_count 
	             	);
		        ?>
			</div>


			
			<?php 
				if (have_posts()) :?>

					<div class="page-header">
						<h2><?php _e( 'Search results', 'ccs' ); ?></h2>
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
		<section id="right-sidebar" class="col-md-3">
			 <?php get_sidebar(); ?>
		</section>
	</div>
</div><!-- end .container -->

<?php get_footer(); ?>