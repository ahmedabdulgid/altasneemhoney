<?php
//code for cart addon
add_shortcode('woo_cart_but', 'woo_cart_but');
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but()
{
  ob_start();

  $cart_count = WC()
    ->cart->cart_contents_count; // Set variable for cart item count
  $cart_url = wc_get_cart_url(); // Set Cart URL

?>
  <span class="menu-item cart-contents" title="My Basket">
    <?php
    if ($cart_count > 0) {
    ?>
      <span class="cart-contents-count"><?php echo $cart_count; ?></span>
    <?php
    } elseif (!$cart_count) {
      echo  '<span class="cart-contents-count">0</span>';
    }
    ?>
  </span>
<?php
  return ob_get_clean();
}
//Add a filter to get the cart count
add_filter('woocommerce_add_to_cart_fragments', 'woo_cart_but_count');
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count($fragments)
{

  ob_start();

  $cart_count = WC()
    ->cart->cart_contents_count;
  $cart_url = wc_get_cart_url();

?>
  <span class="cart-contents menu-item" title="<?php _e('View your shopping cart'); ?>">
    <?php
    if ($cart_count > 0) {
    ?>
      <span class="cart-contents-count"><?php echo $cart_count; ?></span>
    <?php
    } elseif (!$cart_count) {
      echo  '<span class="cart-contents-count">0</span>';
    }
    ?></span>
<?php
  $fragments['span.cart-contents'] = ob_get_clean();

  return $fragments;
}


//Add Cart Icon to an existing menu

add_filter('wp_nav_menu_top-menu_items', 'woo_cart_but_icon', 10, 2); // Change menu to suit - example uses 'top-menu'

/**
 * Add WooCommerce Cart Menu Item Shortcode to particular menu
 */
function woo_cart_but_icon($items, $args)
{
  $items .=  '[woo_cart_but]'; // Adding the created Icon via the shortcode already created

  return $items;
}
