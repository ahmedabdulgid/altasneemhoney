<!-- Start App Menu -->
<aside id="menu-profile" class="app-menu">
  <div class="app-menu__offcanvas">
    <div class="app-menu__container">
      <div class="app-menu__header">
        <div class="header-logo">
          <h2><?php _e('Profile', 'altasneem') ?></h2>
        </div>
        <div class="close-menu" data-dismiss="menu">
          <?php echo get_theme_icon('images/icons/times.svg') ?>
        </div>
      </div>
      <div class="app-menu__inner">
        <nav class="profile-navigation">
          <?php if (is_user_logged_in()) :
            $current_user = wp_get_current_user();
          ?>
            <div class="user-box user-id-<?php echo $current_user->ID; ?>">
              <div class="avatar">
                <?php get_user_avatar(); ?>
              </div>
              <div class="user-info">
                <h6><?php echo $current_user->display_name; ?></h6>
                <a href="#"><?php echo $current_user->user_email; ?></a>
              </div>
            </div>
          <?php endif; ?>
          <ul>

            <?php if (is_user_logged_in()) :
            ?>
              <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                  <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                    <?php echo $label; ?>
                  </a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!is_user_logged_in()) :  ?>
              <li>
                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id'))  ?>" class="active">
                  <span class="text"><?php _e('Login', 'altasneem') ?></span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</aside>
<!-- End App Menu -->