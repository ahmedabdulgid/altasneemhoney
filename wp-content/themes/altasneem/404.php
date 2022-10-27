<?php
$page_container = get_field('page_container');
if ($page_container == null || $page_container === 'boxed')
  $class_container = 'app-container';
?>
<?php get_header(); ?>
<main id="main" class="main">
  <div class="main-wrapper">
    <div class="content-page">
      <section id="error-content" class="error-content">
        <div class="error-content_wrapper">
          <?php echo get_theme_icon('images/vectors/404.svg') ?>
          <h4><?php _e('Page not found ', 'altasneem'); ?></h4>
          <div class="back">
            <span><?php _e('Back to', 'altasneem'); ?></span>
            <a href="<?php echo get_bloginfo('url'); ?>" class="btn btn-primary btn-sm"><?php _e('Home', 'altasneem'); ?></a>
          </div>
        </div>
      </section>
    </div>
  </div>
</main>
<?php get_footer(); ?>