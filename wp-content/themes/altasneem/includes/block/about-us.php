<?php

/**
 * About Us Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-us-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about-us';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults. 
$subtitle = get_field('subtitle');
$title = get_field('title');
$description = get_field('description');
$image = get_field('image');
$link = get_field('link');

?>
<!-- Start About Us -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="app-container">
    <div class="block-wapper">
      <div class="block-image">
        <?php if ($image) : ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['atl']; ?>">
        <?php endif; ?>
      </div>
      <div class="block-inner">
        <div class="block-style">
          <img src="<?php echo get_template_directory_uri() . '/assets/dist/images/vectors/bee_style.png'; ?>" alt="Bee" width="200" height="165">
        </div>
        <?php if ($subtitle) : ?>
          <span class="subtitle"><?php echo $subtitle; ?></span>
        <?php endif; ?>
        <?php if ($title) : ?>
          <h2 class="title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
          <p class="description"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if ($link) : ?>
          <a class="btn btn-primary" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<!-- End About Us -->