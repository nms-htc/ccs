<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() ) {
        return;
    }
?>

<section class="entry-comment">
    <?php if ( have_comments() ) : ?>

        <header class="entry-comments-header">
            <h2 class="comments-title">
                <?php
                    printf( // WPCS: XSS OK
                        esc_html( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'ccs' ) ),
                        number_format_i18n( get_comments_number() )
                    );
                ?>
            </h2>
        </header>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ccs' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'ccs' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'ccs' ) ); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>

        <?php
            wp_list_comments( array(
                'walker'      => new ccs_comment_walker(),
            ) );
        ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ccs' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'ccs' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'ccs' ) ); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ccs' ); ?></p>
    <?php endif; ?>

    <?php 
        
        $commenter = wp_get_current_commenter();
        $req       = get_option( 'require_name_email' );
        $aria_req  = ( $req ? " aria-required='true'" : '' );
        $required_text = '';
        $fields =  array(
            'author' => '<div class="form-group">' . 
                            '<label for="author">' . __( 'Name', 'ccs' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                            '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
                        '</div>',
            
            'email' => '<div class="comment-form-email form-group">' . 
                            '<label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                            '<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . 
                        '</div>',
            
            'url' =>    '<div class="comment-form-url form-group">' . 
                            '<label for="url">' . __( 'Website', 'domainreference' ) . '</label>' . 
                            '<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />' . 
                        '</div>',
        );

        $args = array(
            'id_form'              => 'commentform',
            'id_submit'            => 'submit',
            'class_submit'         => 'submit btn btn-primary',
            'name_submit'          => 'submit',
            'title_reply'          => __( 'Leave a Reply', 'ccs' ),
            'title_reply_to'       => __( 'Leave a Reply to %s', 'ccs' ),
            'cancel_reply_link'    => __( 'Cancel Reply' , 'ccs'),
            'label_submit'         => __( 'Post Comment' , 'ccs'),
            'comment_field'        => '<div class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) .
                                        '</label><textarea id ="comment" name="comment" cols="45" rows="8" class="form-control" aria-required="true">' .
                                    '</textarea></div>',

            'must_log_in'          => '<p class="must-log-in">' .
                                        sprintf(
                                            __( 'You must be <a href="%s">logged in</a> to post a comment.', 'ccs' ),
                                            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                                        ) .
                                    '</p>',

            'logged_in_as'         => '<p class="logged-in-as">' .
                                        sprintf(
                                          __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'ccs' ),
                                          admin_url( 'profile.php' ),
                                          $user_identity,
                                          wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                                        ) .
                                    '</p>',

            'comment_notes_before' => '<p class="comment-notes alert alert-info">' .
                                        __( 'Your email address will not be published.', 'ccs' ) . ( $req ? $required_text : '' ) .
                                    '</p>',

            'comment_notes_after'  => '<p class="form-allowed-tags alert alert-info">' .
                                        sprintf(
                                            __( 'You may use these <abbr title ="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'ccs' ),
                                            ' <code>' . allowed_tags() . '</code>'
                                        ) . '</p>',

            'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
        );
    ?>

    <?php comment_form( $args ); ?>
</section>
