<?php

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'   => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability' => 'edit_posts',
    'redirect'    => false
  )); 
}

function dont_translate_option_page()
{
  $screen = get_current_screen();
  if ($screen->id === "theme-settings") {
    add_filter('bea.aofp.get_default', false);
  }
}
add_action('current_screen', 'dont_translate_option_page');