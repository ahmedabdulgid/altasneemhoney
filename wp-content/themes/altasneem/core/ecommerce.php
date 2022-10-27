<?php

/**
 * Change a currency symbol
 */

function change_existing_currency_symbol($currency_symbol, $currency)
{
  switch ($currency) {
    case 'EGP':
      $currency_symbol =  __('EGP', 'altasneem');
      break;
  }
  return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

/**
 * Breadcrumb 
 */

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_archive_description', 'woocommerce_breadcrumb', 10);

/**
 * Sidebaer 
 */

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

 

/**
 * Checkout Fields Classes
 */
add_filter('woocommerce_billing_fields', 'billing_checkout_fields');
function billing_checkout_fields($fields)
{
   $fields['billing_first_name']['class'][] = 'col-md-6';
  $fields['billing_last_name']['class'][] = 'col-md-6'; 
  $fields['billing_phone']['class'][] = 'col-md-4';
  $fields['billing_state']['class'][] =  'col-md-4';
  $fields['billing_postcode']['class'][] =  'col-md-4'; 
  return $fields;
}


 
add_filter('woocommerce_shipping_fields', 'shipping_checkout_fields');
function shipping_checkout_fields($fields)
{
  $fields['shipping_first_name']['class'][] = 'col-md-6';
  $fields['shipping_last_name']['class'][] = 'col-md-6'; 
  $fields['shipping_state']['class'][] =  'col-md-4';
  $fields['shipping_postcode']['class'][] =  'col-md-4';
  return $fields;
}


/**
 * Remove all possible fields 
 */
add_filter('woocommerce_checkout_fields', 'remove_checkout_fields');
function remove_checkout_fields($fields)
{

  // Billing fields
  unset($fields['billing']['billing_country']);
  // unset($fields['billing']['billing_email']);
  // unset($fields['billing']['billing_phone']);
  // unset($fields['billing']['billing_state']);
  // unset($fields['billing']['billing_first_name']);
  // unset($fields['billing']['billing_last_name']);
  // unset($fields['billing']['billing_address_1']);
  // unset($fields['billing']['billing_address_2']);
  $fields['billing']['billing_city']['required'] = false;
  unset($fields['billing']['billing_city']);
  // unset($fields['billing']['billing_postcode']);

  // Shipping fields
  unset($fields['shipping']['shipping_country']);
  // unset($fields['shipping']['shipping_company']);
  // unset($fields['shipping']['shipping_phone']);
  // unset($fields['shipping']['shipping_state']);
  // unset($fields['shipping']['shipping_first_name']);
  // unset($fields['shipping']['shipping_last_name']);
  // unset($fields['shipping']['shipping_address_1']);
  // unset($fields['shipping']['shipping_address_2']); 
  // $fields['shipping']['shipping_city']['required'] = false;
  unset($fields['shipping']['shipping_city']);
  // unset($fields['shipping']['shipping_postcode']);

  // Order fields
  // unset($fields['order']['order_comments']);

  return $fields;
}

 



function nav_account_order_icons()
{
  $myorder = array(
    // 'my-custom-endpoint' => __('My Stuff', 'woocommerce'),
    'dashboard'          => get_theme_icon('images/icons/tachometer-alt-fast.svg') . __('Dashboard', 'woocommerce'),
    'orders'             => get_theme_icon('images/icons/clipboard-list.svg') . __('Orders', 'woocommerce'), 
    'downloads'          => get_theme_icon('images/icons/download.svg') . __('Download', 'woocommerce'),
    'edit-address'       => get_theme_icon('images/icons/map-marker-alt.svg') . __('Addresses', 'woocommerce'),
    'edit-account'       => get_theme_icon('images/icons/user-circle.svg') . __('Edit account', 'woocommerce'),

    // 'payment-methods'    => __('Payment Methods', 'woocommerce'),
    'customer-logout'    => get_theme_icon('images/icons/reply.svg') . __('Logout', 'woocommerce'),
  );

  return $myorder;
}
add_filter('woocommerce_account_menu_items', 'nav_account_order_icons');
// add_action('woocommerce_after_my_account', 'woocommerce_account_navigation');


/**
 * Show product images in checkout
 */

add_filter('woocommerce_checkout_cart_item_quantity', 'product_image_on_checkout', 10, 3);
function product_image_on_checkout($name, $cart_item, $cart_item_key)
{

  if (!is_checkout())
    return $name;

  $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

  $thumbnail = $_product->get_image('thumbnail');

  $image = '<div class="product-image">'
    . $thumbnail .
    '';

  return $image . $name;
}


add_action('woocommerce_share', 'product_share');
function product_share($name)
{
  global $post;
  if (isset($post->ID)) {
    $permalink = get_permalink($post->ID);
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
    $post_title = rawurlencode(get_the_title($post->ID));
  }

  echo '<div class="product-share">
        ' . get_theme_icon('images/icons/share-alt.svg') .
    '<strong>' . __('Share', 'altasneem') . ': </strong>
    <ul>
      <li>
        <a href="//www.facebook.com/sharer.php?u=' . esc_url($permalink) . '"  target="_blank">
          ' . get_theme_icon('images/icons/facebook-f.svg') . '  
        </a>
      </li>
      <li>
        <a href="//twitter.com/share?url=' . esc_url($permalink) . '" target="_blank">
          ' . get_theme_icon('images/icons/twitter.svg') . '  
        </a>
      </li>
      <li>
        <a href="//pinterest.com/pin/create/button/?url=' . esc_url($permalink) . '&amp;media=' . esc_attr($featured_image) . '&amp;description=' . esc_attr($post_title) . '" target="_blank" >
          ' . get_theme_icon('images/icons/pinterest-p.svg') . '  
        </a>
      </li>
       <li>
          <a href="//linkedin.com/shareArticle?mini=true&amp;url=' . esc_url($permalink) . '" target="_blank">
            ' . get_theme_icon('images/icons/linkedin-in.svg') . '
          </a>
        </li>
        <li>
          <a href="//telegram.me/share/?url=' . esc_url($permalink) . '" target="_blank"  >
            ' . get_theme_icon('images/icons/telegram-plane.svg') . '
          </a>
        </li>
          <li>
          <a href="whatsapp://send?url=' . esc_url($permalink) . '"  data-action="share/whatsapp/share"   target="_blank"  >
            ' . get_theme_icon('images/icons/whatsapp.svg') . '
          </a>
        </li>
    </ul>
  </div>';
}

/**
 * WooCommerce Flexslider options
 */

add_filter('woocommerce_single_product_carousel_options', 'single_product_carousel_options');
function single_product_carousel_options($options)
{

  $options['directionNav'] = true;
  $options['prevText'] = is_rtl() ? get_theme_icon('images/icons/angle-right.svg') : get_theme_icon('images/icons/angle-left.svg');
  $options['nextText'] = is_rtl() ? get_theme_icon('images/icons/angle-left.svg') : get_theme_icon('images/icons/angle-right.svg');

  return $options;
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_filter( 'woocommerce_is_purchasable', '__return_false');

