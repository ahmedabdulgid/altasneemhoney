<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
  return;
}
?>

<li <?php wc_product_class('product-box', $product); ?>>
  <div class="product-box_wrap">
    <div class="product-box_image">
      <?php
      woocommerce_template_loop_product_link_open();
      ?>
      <?php
      do_action('woocommerce_before_shop_loop_item_title');
      ?>
      <?php
      woocommerce_template_loop_product_link_close();
      ?>
      <div class="product-box_actions">
        <button class="product-box_actions-wishlist">
          <?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
        </button>
      </div>
    </div>
    <div class="product-box_inner">
      <h4 class="product-box_title">
        <?php
        woocommerce_template_loop_product_link_open();
        the_title();
        woocommerce_template_loop_product_link_close();
        ?>
      </h4>
      <div class="product-box_reviews">
        <?php woocommerce_template_loop_rating(); ?>
      </div>
      <div class="product-box_price">
        <?php woocommerce_template_loop_price(); ?>
      </div>
      <div class="product-box_button">
        <?php woocommerce_template_loop_add_to_cart(); ?>
      </div>
    </div>
  </div>
</li>