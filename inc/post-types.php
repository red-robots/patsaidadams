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

  
function build_taxonomies() {
  // custom tax
      register_taxonomy( 'main', 'post',
      array(
        'hierarchical' => true, // true = acts like categories false = acts like tags
        'label' => 'Categories',
        'query_var' => true,
        'show_admin_column' => true,
        'public' => true,
        'rewrite' => array( 'slug' => 'main-categories' ),
        '_builtin' => true
      ) );
  } // End build taxonomies
  add_action( 'init', 'build_taxonomies', 0 );

  //from http://revelationconcept.com/wordpress-rename-default-category-taxonomy/
function bella_change_cat_label() {
  global $submenu;
  $submenu['edit.php'][15][0] = 'Themes'; // Rename categories to Authors
}
add_action( 'admin_menu', 'bella_change_cat_label' );

function bella_change_cat_object() {
  global $wp_taxonomies;
  $labels = &$wp_taxonomies['category']->labels;
  $labels->name = 'Themes';
  $labels->singular_name = 'Theme';
  $labels->add_new = 'Add Theme';
  $labels->add_new_item = 'Add Theme';
  $labels->edit_item = 'Edit Theme';
  $labels->new_item = 'Theme';
  $labels->view_item = 'View Theme';
  $labels->search_items = 'Search Themes';
  $labels->not_found = 'No Themes found';
  $labels->not_found_in_trash = 'No Themes found in Trash';
  $labels->all_items = 'All Themes';
  $labels->menu_name = 'Themes';
  $labels->name_admin_bar = 'Themes';
}
add_action( 'init', 'bella_change_cat_object' );