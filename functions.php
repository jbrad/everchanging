<?php

/*
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ INSTRUCTIONS /\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\

	The following functions in Standard 3 are able to be overridden in your child 
	theme.
	
		standard_page_menu
		standard_add_theme_background
		standard_add_theme_editor_style
		standard_add_theme_menus
		standard_add_theme_sidebars
		standard_add_theme_features
		standard_set_theme_colors
		standard_header_style
		standard_admin_header_style
		standard_admin_header_image
		standard_custom_comment
		standard_process_link_post_format_content
		standard_process_link_post_format_title
		standard_remove_paragraph_on_media
		standard_wrap_embeds
		standard_search_form
		standard_post_format_rss
		standard_modify_widget_titles
		standard_add_title_to_single_post_pagination
		standard_comment_form
    
    Do not modify anything in-between the "DO NOT MODIFY" start and end sections.
    
	You may place any functions outlined in our FAQs & tutorials on the support
	forum in this file, as instructed, or any other code you create yourself or find
	from around the web below the "CUSTOMIZATIONS" section at the end of the file.
	
	Be forewarned that even the simplest mistake within this file can completely
	bring down your website. Please make sure to create backups and have FTP
	access to your server before modifying this file so you amy correct any issues.
	
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\/\/\/\/\/\
*/


/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/ DO NOT MODIFY START /\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

/**
 * Reorders the loading of Standard's styles to ensure that the child theme kit's
 * styles.css gets loaded last. This allows the child theme kit to override all
 * Standard styles.
 *
 * @since	3.2.1
 * @version	1.0
 */
function standard_child_theme_kit_reorder_styles() {
    global $wp_styles;

    wp_dequeue_style( 'theme-responsive' );

    // font-awesome
    wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css');

    // font-awesome-ie7
    wp_enqueue_style( 'font-awesome-ie7', '//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome-ie7.min.css');
    $wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'IE 7' );

    // open-sans
    wp_enqueue_style( 'open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans');

} // end standard_child_theme_kit_reorder_styles

add_action( 'wp_enqueue_scripts', 'standard_child_theme_kit_reorder_styles', 1000 );

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ DO NOT MODIFY END /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */


/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ CUSTOMIZATIONS /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

/**
 * Renders a simplified version of the search form.
 *
 * @return string The search form.
 * @version 3.0
 * @since 3.0
 */
function standard_search_form() {

    // Get the default text for the search form
    $query = strlen( get_search_query() ) == 0 ? '' : get_search_query();

    // Create list of search items
    $list = array("Standard Theme","Child Themes","8BIT","WordPress","Bootstrap");

    // Turn search items into single string
    $combined = implode("&quot;,&quot;", $list);

    // Render the form
    $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">';
    $form .= '<div class="input-append">';
    $form .= '<input autocomplete="off" data-provide="typeahead" data-source="[&quot;';
    $form .= $combined;
    $form .= '&quot;]" placeholder="' . __( 'Search', 'standard' ) . '" type="text" value="';
    $form .= $query;
    $form .= '" name="s" id="s" data-items="4" />';
    $form .= '<button type="submit" class="btn"><i class="icon-search"></i></button>';
    $form .= '</div>';
    $form .= '</form>';

    // Initialize typeahead javascript
    $form .= '<script>';
    $form .= '(function($) {';
    $form .= '"use strict"';
    $form .= '(jQuery)(\'#s\').typeahead();';
    $form .= '});';
    $form .= '</script>';

    return $form;

} // end standard_search_form
add_filter( 'get_search_form', 'standard_search_form' );