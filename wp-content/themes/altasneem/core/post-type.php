<?php

/************************************************
* Custom Post Types
************************************************/

/*
* FAQ Post
*/
function faq_post_type()
{
  $faq_labels = array(
    'name'                => _x('FAQ', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('FAQ', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('FAQ', 'text_domain'),
    'parent_item_colon'   => __('Parent FAQ:', 'text_domain'),
    'all_items'           => __('All FAQ', 'text_domain'),
    'view_item'           => __('View FAQ', 'text_domain'),
    'add_new_item'        => __('Add New FAQ', 'text_domain'),
    'add_new'             => __('New FAQ', 'text_domain'),
    'edit_item'           => __('Edit FAQ', 'text_domain'),
    'update_item'         => __('Update FAQ', 'text_domain'),
    'search_items'        => __('Search FAQ', 'text_domain'),
    'not_found'           => __('No FAQ Found', 'text_domain'),
    'not_found_in_trash'  => __('No FAQ Found in Trash', 'text_domain'),
  );

  $args = array(
    'label'               => __('FAQ', 'text_domain'),
    'description'         => __('Referable FAQ', 'text_domain'),
    'labels'              => $faq_labels,
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'supports'            => array('title', 'editor'),
    'menu_position'       => 8,
    'menu_icon'           => 'dashicons-info-outline',
    'can_export'          => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    //'taxonomies'  => array('post_tag'),
    //'has_archive' => true,
    'rewrite'             => array('slug' => 'faq')
  );

  register_post_type('faq', $args);
}

// Hook into the 'init' action
add_action('init', 'faq_post_type', 0);


// Category Taxonomy
function faq_cat_taxonomy()
{
  $service_cat_labels = array(
    'name'                       => _x('FAQ Categories', 'Taxonomy General Name', 'text_domain'),
    'singular_name'              => _x('Category', 'Taxonomy Singular Name', 'text_domain'),
    'menu_name'                  => __('Category', 'text_domain'),
    'all_items'                  => __('All Categories', 'text_domain'),
    'parent_item'                => __('Parent Category', 'text_domain'),
    'parent_item_colon'          => __('Parent Category:', 'text_domain'),
    'new_item_name'              => __('New Category Name', 'text_domain'),
    'add_new_item'               => __('Add New Category', 'text_domain'),
    'edit_item'                  => __('Edit Category', 'text_domain'),
    'update_item'                => __('Update Category', 'text_domain'),
    'separate_items_with_commas' => __('Separate Category with commas', 'text_domain'),
    'search_items'               => __('Search Category', 'text_domain'),
    'add_or_remove_items'        => __('Add or Remove Category', 'text_domain'),
    'choose_from_most_used'      => __('Choose from Most Used Category', 'text_domain'),
  );

  register_taxonomy('faq_cat', array('faq'), array(
    'labels'                     => $service_cat_labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'rewrite'                    => array('slug' => 'faq_cat')
  ));
}
// Hook into the 'init' action
add_action('init', 'faq_cat_taxonomy', 0);
 
 