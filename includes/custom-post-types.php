<?php
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_bbslider');
function post_type_bbslider()
{
  $labels = array(
    'name' => _x('Slider', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add New', 'Slide'),
    'add_new_item' => __('Add New Slide')
 
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => false,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 9,
    //'menu_icon' =>  '',
    'supports' => array('title', 'thumbnail', 'excerpt'));
 
  register_post_type('slider',$args);
  flush_rewrite_rules();
}
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_team');
function post_type_team()
{
  $labels = array(
    'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Team', 'post type singular name'),
    'add_new' => _x('Add New', 'Member'),
    'add_new_item' => __('Add New Member')
 
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 11,
    //'menu_icon' =>  '',
    'supports' => array('title', 'thumbnail', 'editor'));
 
  register_post_type('team',$args);
  flush_rewrite_rules();
}
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_gallery');
function post_type_gallery()
{
  $labels = array(
    'name' => _x('Gallery', 'post type general name'),
    'singular_name' => _x('Gallery', 'post type singular name'),
    'add_new' => _x('Add New', 'Album'),
    'add_new_item' => __('Add New Album')
 
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 11,
    //'menu_icon' =>  '',
    'supports' => array('title', 'thumbnail', 'editor'));
 
  register_post_type('gallery',$args);
  flush_rewrite_rules();
}
?>