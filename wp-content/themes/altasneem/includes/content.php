<article <?php post_class(is_singular() ? 'post' . ' post-single'  : 'post'); ?> id="post-<?php the_ID(); ?>">
  <div class="post-container">
    <?php get_template_part('includes/featured-image'); ?>
    <div class="post-body">
      <div class="body-inner">
        <div class="post-meta">
          <span class="post-date"><?php echo get_theme_icon('images/icons/calendar-alt.svg') ?><?php echo get_the_date('F j, Y'); ?></span>
          <span class="post-cat"><?php echo get_theme_icon('images/icons/tag.svg') ?><?php the_category(); ?></span>
        </div>
        <?php if (is_singular()) : ?>
          <h1 class="post-title h2"><?php echo get_the_title(); ?></h1>
        <?php else : ?>
          <h3 class="post-title">
            <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
          </h3>
        <?php endif; ?>
        <?php if (is_singular()) : ?>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
        <?php else : ?>
          <div class="post-excerpt">
            <?php echo excerpt(23); ?>
          </div>
        <?php endif; ?>
        <?php if (!is_singular()) : ?>
          <div class="post-more">
            <a href="<?php echo get_permalink(); ?>" class="btn btn-sm btn-primary"><?php _e('Read More', 'altasneem'); ?></a>
          </div>
        <?php endif; ?>
        <?php if (is_singular()) : ?>
          <div class="post-footer">
            <div class="post-tags">
              <?php if (has_tag()) : ?>
                <span><?php _e('Tags', 'altasneem') ?>:</span>
                <?php the_tags(' ', ' ') ?>
              <?php endif; ?>
            </div>
            <div class="post-share">
              <span><?php _e('Share', 'altasneem') ?>:</span>
              <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a target="_blank" href="http://twitter.com/share?url=<?php echo get_permalink(); ?>">
                <i class="fa fa-twitter"></i>
              </a>
              <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>">
                <i class="fa fa-pinterest-p"></i>
              </a>
              <a darget="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>">
                <i class="fa fa-google"></i>
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <?php
      if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) :
      ?>
        <div class="comments-wrapper section-inner">
          <?php comments_template(); ?>
        </div><!-- .comments-wrapper -->
      <?php endif; ?>
    </div>
  </div>
</article>