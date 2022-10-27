<?php

/**
 * Contact Us Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-us-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-us';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

// Load values and assign defaults. 

$location = get_field('location', 'option');
$email = get_field('email', 'option');
$mobile = get_field('mobile', 'option');
$whatsapp = get_field('whatsapp', 'option');
$telegram = get_field('telegram', 'option');
$contact_form = get_field('contact_form', 'option');

?>
<!-- Start Contact Us -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="app-container">
    <div class="block-wapper">
      <div class="row">
        <div class="col-md-5">
          <div class="contact-info">
            <div class="item address">
              <h3><?php _e('Address', 'altasneem') ?></h3>
              <?php if ($location['address']) : ?>
                <p><?php echo $location['address']; ?></p>
              <?php endif; ?>
            </div>
            <div class="item call-us">
              <h3><?php _e('Call US', 'altasneem') ?></h3>
              <ul>
                <?php if ($mobile) : ?>
                  <li><a href="tel:<?php echo $mobile; ?>"><?php echo get_theme_icon('images/icons/mobile-alt.svg') ?><?php echo $mobile; ?></a></li>
                <?php endif; ?>
                <?php if ($whatsapp) : ?>
                  <li><a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>"><?php echo get_theme_icon('images/icons/whatsapp.svg') ?><?php echo $whatsapp; ?></a></li>
                <?php endif; ?>
                <?php if ($email) : ?>
                  <li><a href="mailto:<?php echo $email; ?>"><?php echo get_theme_icon('images/icons/envelope.svg') ?><?php echo $email; ?></a></li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="item social">
              <h3><?php _e('Follow us', 'altasneem') ?></h3>
              <div class="social-icons">
                <?php if (have_rows('social_networks', 'option')) : ?>
                  <ul>
                    <?php
                    while (have_rows('social_networks', 'option')) :
                      the_row();
                      $icon = get_sub_field('icon', 'option');
                      $url = get_sub_field('url', 'option');
                    ?>
                      <li><a href="<?php echo $url; ?>"><?php echo file_get_contents($icon['url']); ?></a></li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="contact-form">
            <?php echo do_shortcode($contact_form); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Us -->