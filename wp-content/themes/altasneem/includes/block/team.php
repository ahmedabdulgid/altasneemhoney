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
$id = 'team-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults. 
$title = get_field('title');

?>
<!-- Start Slider Home -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if (have_rows('members')) : ?>
    <div class="app-container">
      <div class="block-head">
        <?php if ($title) : ?>
          <h2 class="title"><?php echo $title; ?></h2>
        <?php endif; ?>
      </div>
      <div class="row">
        <!-- Slides -->
        <?php while (have_rows('members')) :
          the_row();
          $name = get_sub_field('name');
          $position = get_sub_field('position');
          $avatar = get_sub_field('avatar');
        ?>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="member">
              <div class="member-wrap">
                <?php if ($avatar) : ?>
                  <div class="member-avatar">
                    <img src="<?php echo $avatar['url']; ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>">
                  </div>
                <?php endif; ?>
                <?php if ($name) : ?>
                  <h4 class="name"><a href="#"><?php echo $name; ?></a></h4>
                <?php endif; ?>
                <?php if ($position) : ?>
                  <span class="position" data-swiper-parallax="-500"><?php echo $position; ?></span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- End Slider Home -->