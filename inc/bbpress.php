<?php
	/**
	 * Enable visual editor tinymce and disable quick tags function
	 * @param  array  $args [description]
	 * @return [type]       [description]
	 */
	function bbp_enable_visual_editor( $args = array() ) {
	    $args['tinymce'] = true;
	    return $args;
	}
	add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

	// Hook topick status select
    function filter_bbp_get_form_topic_status_dropdown( $result, $r ) {
        $result = preg_replace('/(<select)(\s)/i', '<select class="form-control"', $result);
        return $result;
    };
            
    // add the filter
    add_filter( 'bbp_get_form_topic_status_dropdown', 'filter_bbp_get_form_topic_status_dropdown', 10, 2 );

    function filter_bbp_get_form_topic_type_dropdown( $result, $r ) {
        $result = preg_replace('/(<select)(\s)/i', '<select class="form-control"', $result);
        return $result;
    };
    add_filter( 'bbp_get_form_topic_type_dropdown', 'filter_bbp_get_form_topic_type_dropdown', 10, 2 );


	function filter_bbp_get_single_forum_description( $result, $r ) {
         $result = str_replace('<div class="bbp-template-notice info"><p class="bbp-forum-description">', 
         	'<div class="alert alert-info" style="clear: both;"><p class="bbp-forum-description">', $result);

        return $result;
    };
    add_filter( 'bbp_get_single_forum_description', 'filter_bbp_get_single_forum_description', 10, 2 );

    function filter_bbp_get_single_topic_description( $result, $r ) {
         $result = str_replace('<div class="bbp-template-notice info">', 
         	'<div class="alert alert-info" style="clear: both;">', $result);
        return $result;
    };
    add_filter( 'bbp_get_single_topic_description', 'filter_bbp_get_single_topic_description', 10, 2 );
    
?>