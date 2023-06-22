<?php
/*
  Plugin Name: List Categories
  Plugin URI: https://github.com/brahmatechnolab/VisionAduPlugins
  Description: Simple plugin to display categories in any post or page
  with a shortcode. It's basically a shortcode API interface to the
  wp_list_categories WordPress function.
  Version: 0.1
  Author: Snehal Brahmbhatt
  Author URI: https://www.brahmatechnolab.com/
*/
class ListCategories {
  static function list_categories($atts, $content = null) {
    $atts = shortcode_atts(
      array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 0,
        'echo'                => 1,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => 1,
        'include'             => '',
        'number'              => null,
        'order'               => 'ASC',
        'orderby'             => 'name',
        'pad_counts'          => 0,
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories' ),
        'style'               => 'list',
        'taxonomy'            => 'category',
        'title_li'            => __( 'Categories' ),
        'use_desc_for_title'  => 1,
        'walker'              => null,
      ), $atts
    );

    ob_start();
    wp_list_categories($atts);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }
}

add_shortcode( 'categories', array('ListCategories', 'list_categories') );
