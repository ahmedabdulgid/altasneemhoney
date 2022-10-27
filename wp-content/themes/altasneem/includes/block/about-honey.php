<?php

/**
 * About Honey Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-honey-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about-honey';
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
$properties_title = get_field('properties_title');
$properties = get_field('properties');
?>
<!-- Start About Honey -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="app-container">
    <div class="block-wapper">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="block-inner">
            <?php if ($subtitle) : ?>
              <span class="subtitle"><?php echo $subtitle; ?></span>
            <?php endif; ?>
            <?php if ($title) : ?>
              <h2 class="title title-head"><span><?php echo $title; ?></span></h2>
            <?php endif; ?>
            <?php if ($description) : ?>
              <p class="description"><?php echo $description; ?></p>
            <?php endif; ?>
            <?php if ($link) : ?>
              <a class="btn btn-primary" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="block-image">
            <?php if ($image) : ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['atl']; ?>">
            <?php endif; ?>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="block-properties">
            <?php if ($properties_title) : ?>
              <h3 class="title"><?php echo $properties_title; ?></h3>
            <?php endif; ?>
            <?php if ($properties) : ?>
              <div class="properties"><?php echo $properties; ?></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End About Honey -->