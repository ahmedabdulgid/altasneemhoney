<?php

/**
 * Featured Products Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-products-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-products';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults. 

$title = get_field('title');
$description = get_field('description');
$image = get_field('image');
$link = get_field('link');

?>
<!-- Start Featured Products -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="app-container">
    <div class="block-wapper">
      <div class="block-head">
        <?php if ($title) : ?>
          <h2 class="title title-head title-center"><span><?php echo $title; ?></span></h2>
        <?php endif; ?>
      </div>
      <?php echo !is_admin() ? do_shortcode('[featured_products limit="4" columns="4" ]') : ''; ?>
    </div>
  </div>
</section>
<!-- End Featured Products -->