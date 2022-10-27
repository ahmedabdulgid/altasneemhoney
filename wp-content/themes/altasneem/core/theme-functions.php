<?php

if (!function_exists('get_theme_icon')) {
  function get_theme_icon($dir)
  {
    if ($dir) {
      $file_content = @file_get_contents(get_template_directory_uri() . '/assets/dist/' . $dir);
      if (!$file_content === false) {
        return $file_content;
      }
    }
  }
}

function get_user_avatar()
{
  if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    $current_user = wp_get_current_user();
    // Get attachment id
    $attachment_id = get_user_meta($user_id, 'image', true);
    $attachment_url = wp_get_attachment_image_src($attachment_id, 'thumbnail')[0];
    // True
    if ($attachment_url) {
      echo '<img class="avatar" src="' .  $attachment_url . '" alt="' . $current_user->display_name . '" width="65" height="65">';
    } else {
      echo '<img class="avatar" src="' . get_template_directory_uri() . '/assets/dist/images/avatar.png" alt="' . $current_user->display_name . '" width="65" height="65">';
    }
  } else {
    echo '<img class="avatar" src="' . get_template_directory_uri() . '/assets/dist/images/avatar.png" alt="User" width="65" height="65">';
  }
}

/**
 * Support SVG Files
 */

add_filter('upload_mimes', 'enable_svg');
function enable_svg($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}



/** 
 * Menus
 */

function main_menu()
{
  wp_nav_menu(array(
    'theme_location' => 'main-menu',
    'container'       => '',
    'menu'            => '',
  ));
}



/**
 * Customize The Excerpt Words Length and Dots More
 */

function excerpt($limit)
{
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt) >= $limit) {
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . '...';
  } else {
    $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}


/*
* ACF Google Map API
*/
// Method 1: Filter.
function my_acf_google_map_api($api)
{
  $api['key'] = 'AIzaSyDTW63QsiApZHgZ5XB1yLLZSBHiRcRN6c0';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Method 2: Setting.
function my_acf_init()
{
  acf_update_setting('google_api_key', '');
}
add_action('acf/init', 'my_acf_init');

/**
 * Remove "Category:", "Tag:", "Author:" from the_archive_title
 */
add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { //for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});