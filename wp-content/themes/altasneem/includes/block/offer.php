<?php

/**
 * Offer Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'offer-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'offer';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults. 
$background_image = get_field('background_image');
$title = get_field('title');
$link = get_field('link');
$description = get_field('description');
?>
<!-- Start Offer -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image: url(<?php echo $background_image['url']; ?>);">
  <div class="block-wapper">
    <div class="app-container">
      <div class="block-inner">
        <?php if ($title) : ?>
          <h2 class="title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
          <p class="description"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if ($link) : ?>
          <a class="btn btn-white" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
        <?php endif; ?>
      </div>      
    </div>
  </div>
</section>
<!-- End Offer -->
 