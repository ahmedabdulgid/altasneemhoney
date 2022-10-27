<?php
function sidebar_widgets_init()
{
  register_sidebar(array(
    'name'          => __('Main Sidebar', 'textdomain'),
    'id'            => 'sidebar_blog',
    'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="widgettitle">',
    'after_title'   => '</h4>',
  ));
}
add_action('widgets_init', 'sidebar_widgets_init');
