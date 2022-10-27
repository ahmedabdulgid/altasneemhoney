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
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>