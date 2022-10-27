<?php
$page_container = get_field('page_container');
if ($page_container == null || $page_container === 'boxed')
  $class_container = 'app-container';
?>
<?php get_header(); ?>
<main id="main" class="main">
  <div class="main-wrapper">
    <?php get_template_part('includes/content', 'hero') ?>
    <div class="content-page">
      <div class="<?php echo $class_container; ?>">
        <div class="row">
          <div class="col-lg-9">
            <?php
            if (have_posts()) :
            ?>
              <div class="row">
                <?php
                while (have_posts()) :
                  the_post();
                ?>
                  <div class="col-md-6">
                    <?php get_template_part('includes/content', get_post_type()); ?>
                  </div>
                <?php endwhile; ?>
              </div>
              <?php get_template_part('includes/pagination', ''); ?>
            <?php endif;
            wp_reset_query(); ?>
          </div>
          <div class="col-lg-3">
            <?php get_sidebar() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>