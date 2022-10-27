<?php
$logo = get_field('logo', 'option');
$primary_color = get_field('primary_color', 'option');
$wishlist_page = get_field('wishlist_page', 'option');


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> style="--primary:<?php echo $primary_color ?  $primary_color : ''; ?>">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <title><?php
          if (is_front_page()) {
            echo get_bloginfo('name');
            echo get_bloginfo('description') ? ' | ' . get_bloginfo('description') : false;
          } else {
            wp_title('', true, 'right');
          }
          ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="app-preloader" class="app-preloader">
      <div class="app-preloader_container">
        <div class="bee">
          <div class="body">
            <div class="line"></div>
          </div>
          <div>
            <div class="wing-right"></div>
            <div class="wing-left"></div>
          </div>
          <div class="path">
            <div class="pollen"></div>
            <div class="pollen"></div>
            <div class="pollen"></div>
            <div class="pollen"></div>
          </div>
        </div>
      </div>
    </div>
  <div class="wrapper">
    <header class="header <?php echo is_404() ? 'dark' : ''; ?>">
      <div class="app-container">
        <div class="header_wrapper">
          <div class="header_wrapper-left">
            <div class="logo">
              <a href="<?php echo get_bloginfo('url') ?>">
                <?php if ($logo) : ?>
                  <img src="<?php echo $logo['url'] ?>" alt="<?php echo get_bloginfo('name') ?>">
                <?php else : ?>
                  <h2><?php echo get_bloginfo('name') ?></h2>
                <?php endif; ?>
              </a>
            </div>
          </div>
          <div class="header_wrapper-center">
            <nav class="main-menu">
              <?php main_menu() ?>
            </nav>
          </div>
          <div class="header_wrapper-right">
            <div class="header-actions">
              <ul>
                <li class="share" id="share_product">
                  <a href="#" data-target="share"><?php echo get_theme_icon('images/icons/share-alt.svg') ?></a>
                </li>
                <li class="menu">
                  <a href="javascript: voild(0);" data-toggle="menu" data-target="#menu-main">
                    <?php echo get_theme_icon('images/icons/bars.svg') ?>
                  </a>
                </li>
                <li class="cart">
                  <a href="javascript: voild(0);" class="app-cat-toggle">
                    <?php echo get_theme_icon('images/icons/shopping-cart.svg') ?>
                    <?php echo do_shortcode("[woo_cart_but]"); ?>
                  </a>
                </li>
                <li class="wishlist">
                  <a href="<?php echo $wishlist_page; ?>">
                    <?php echo get_theme_icon('images/icons/heart.svg') ?>
                    <?php echo do_shortcode("[yith_wcwl_items_count]"); ?>
                  </a>
                </li>
                <li class="search">
                  <a href="javascript: voild(0);" data-toggle="modal" data-target="#modal-search">
                    <?php echo get_theme_icon('images/icons/search.svg') ?>
                  </a>
                </li>
                <li class="user">
                  <a href="<?php echo is_user_logged_in() ? get_permalink(wc_get_page_id('myaccount')) : '#' ?>" <?php echo !is_user_logged_in() ? 'data-toggle="modal" data-target="#modal-login"' : '' ?>><?php echo get_theme_icon('images/icons/user.svg') ?><span class="text"><?php echo is_user_logged_in() ? __('Welcome', 'altasneem') : __('Login', 'altasneem')  ?></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <?php get_template_part('includes/menu/profile') ?>
    <?php get_template_part('includes/menu/mobile') ?>
    <?php get_template_part('includes/modal/search') ?>
    <?php get_template_part('includes/modal/auth') ?>