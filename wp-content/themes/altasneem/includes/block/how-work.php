<?php

/**
 * How we Work Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'how-work-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'how-work';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults. 
$background_image = get_field('background_image');
$subtitle = get_field('subtitle');
$title = get_field('title');
$link = get_field('link');
$video = get_field('video');
?>
<!-- Start How we Work -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image: url(<?php echo $background_image['url']; ?>);">
  <div class="block-wapper">
    <div class="app-container">
      <div class="row">
        <div class="col-md-7">
          <div class="block-inner">
            <?php if ($subtitle) : ?>
              <span class="subtitle"><?php echo $subtitle; ?></span>
            <?php endif; ?>
            <?php if ($title) : ?>
              <h2 class="title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($link) : ?>
              <a class="btn btn-primary" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-md-5">
          <div class="block-video">
            <?php if ($video) : ?>
              <button class="video-open" data-toggle="modal" data-target="#modal-video-<?php echo esc_attr($id); ?>" data-video="<?php //echo $video; ?>">
                <?php echo get_theme_icon('images/icons/play.svg') ?>
              </button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End How we Work -->

<?php if ($video) : ?>
  <div id="modal-video-<?php echo esc_attr($id); ?>" class="modal-video modal">
    <div class="modal-container">
      <button class="modal-close" data-dismiss="modal">
        <?php echo get_theme_icon('images/icons/times.svg') ?>
      </button>
      <div class="modal-wrap">
        <div class="video">
          <?php echo $video; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>