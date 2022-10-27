<?php
$hero_background_option = get_field('hero_background', 'option');
$hero_background = get_field('hero_background');
$background = $hero_background ? $hero_background['url'] : $hero_background_option['url'];
$enable_hero = get_field('enable_hero');
if ($enable_hero === false) {
  return;
}
?>

<header class="hero-page" style="background-image: url(<?php echo $background ?>);">
  <div class="hero-page__wrapper">
    <div class="app-container">
      <h1 class="title h2"><?php if (is_home()) {
                              single_post_title();
                            } elseif (is_archive()) {
                              the_archive_title('', '');
                            } elseif (is_search()) {
                              echo __('Results for', 'altasneem') . ' :'. get_search_query();
                            } else {
                              the_title();
                            }
                            ?></h1>
      <?php woocommerce_breadcrumb(); ?>
    </div>
  </div>
</header>