<?php
	class ccs_comment_walker extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
		// constructor – wrapper for the comments list
		function __construct() { ?>
 
			<section class="comments-list">
 
		<?php }
 
		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>
			
			<!-- <section class="child-comments comments-list"> -->
 
		<?php }
	
		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>
 
			</div>
 
		<?php }
 
		// start_el – HTML for comment template
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 
	
			if ( 'article' == $args['style'] ) {
				$tag = 'article';
				$add_below = 'comment';
			} else {
				$tag = 'article';
				$add_below = 'comment';
			} ?>
 
			<article <?php comment_class(empty( $args['has_children'] ) ? 'media' : array( 'media', 'parent' ) ) ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
				<figure class="media-left author-avatar"><?php echo get_avatar( $comment, 65); ?></figure>
				<div class="media-body" role="complementary">
					<div class="comment-meta post-meta">
						<h3 class="comment-author">
							<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
							<small><?php printf(__( ' say at %1$s %2$s', 'ccs' ), get_comment_date( 'd/m/Y' ), get_comment_time());?></small>
						</h3>
						
						<?php if ($comment->comment_approved == '0') : ?>
							<p class="comment-meta-item">Your comment is awaiting moderation.</p>
						<?php endif; ?>
					</div>
					<div class="comment-content post-content" itemprop="text">
						<?php comment_text() ?>
						<?php edit_comment_link( esc_html__( 'Edit', 'ccs' ), '' , '' ); ?>
						<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
				<?php if (empty( $args['has_children'] )) : ?>
				</div>
				<?php endif; ?>
				
 
		<?php }
 
		// end_el – closing HTML for comment template
		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
 
			</article>
 
		<?php }
 
		// destructor – closing wrapper for the comments list
		function __destruct() { ?>
 
			</section>
		
		<?php }
 
	}
?>
