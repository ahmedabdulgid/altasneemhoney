<?php

/**
 * blog Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-section-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog-section';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults.  
$title = get_field('title');
?>
<!-- Start blog -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="block-wapper">
    <div class="app-container">
      <div class="block-head">
        <?php if ($title) : ?>
          <h2 class="title title-head title-center"><span><?php echo $title; ?></span></h2>
        <?php endif; ?>
      </div>
      <?php
      global $wp_query;
      $wp_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => '3',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'orderby' => 'post_date',
        'order' => 'desc',
      ));
      if ($wp_query->have_posts()) :
      ?>
        <div class="row">
          <?php
          while ($wp_query->have_posts()) :
            $wp_query->the_post();
            $id = get_the_ID();
          ?>
            <div class="col-sm-6 col-lg-4">
              <?php get_template_part('includes/content', 'post'); ?>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>
<!-- End blog -->