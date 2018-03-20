<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Books', 'post type general name'),
    'singular_name' => _x('Book', 'post type singular name'),
    'add_new' => _x('Add New', 'Book'),
    'add_new_item' => __('Add New Book'),
    'edit_item' => __('Edit Book'),
    'new_item' => __('New Book'),
    'view_item' => __('View Book'),
    'search_items' => __('Search Books'),
    'not_found' =>  __('No Books found'),
    'not_found_in_trash' => __('No Books found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Books'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','excerpt','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('book',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type