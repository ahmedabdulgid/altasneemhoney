<?php

/**
 * Slider Home Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'home-slider-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-slider';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults. 


?>
<!-- Start Slider Home -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if (have_rows('items')) : ?>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php while (have_rows('items')) :
          the_row();
          $subtitle = get_sub_field('subtitle');
          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $link = get_sub_field('link');
          $background_image = get_sub_field('background_image');
          $align = get_sub_field('align');
        ?>
          <div class="swiper-slide" style="background-image: url(<?php echo $background_image['url']; ?>);">
            <div class="app-container">
              <div class="slide-wrap">
                <?php if ($subtitle) : ?>
                  <span class="subtitle" data-swiper-parallax="-600"><?php echo $subtitle; ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                  <h2 class="title h1" data-swiper-parallax="-500"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                  <p class="description" data-swiper-parallax="-400"><?php echo $description; ?></p>
                <?php endif; ?>
                <div class="links" data-swiper-parallax="-500">
                  <?php if ($link) : ?>
                    <a class="btn btn-primary" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                  <?php endif; ?>
                  <a class="btn btn-primary" href="<?php echo wc_get_page_permalink('shop'); ?>"><?php _e('Shop Now', 'altasneem') ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  <?php endif; ?>
</section>
<!-- End Slider Home -->