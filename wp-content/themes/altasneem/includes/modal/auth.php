<div id="modal-login" class="modal-login modal">
  <div class="modal-container">
    <button class="modal-close" data-dismiss="modal">
      <?php echo get_theme_icon('images/icons/times.svg') ?>
    </button>
    <div class="modal-wrap">
      <div class="modal-head">
        <?php $logo = get_field('logo', 'option');
        if ($logo) : ?>
          <div class="modal-logo">
            <a href="<?php echo get_bloginfo('url'); ?>" class="home-link">
              <img class="logo-app" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo('name'); ?>" width="150">
            </a>
          </div>
        <?php endif; ?>
        <h4><?php _e('Login / Register', 'altasneem'); ?></h4>
      </div> 

      <div class="auth-form login-auth-form">
        <div class="modal-wrapper">
          <?php echo do_shortcode('[theme-my-login action="login"]') ?>
        </div>
        <div class="modal-footer">
          <div class="or">
            <hr><span><?php _e('Or', 'altasneem'); ?></span>
          </div>
          <p><?php _e('Don \'t have any account?', 'altasneem'); ?> <a href="#" data-form="register"><?php _e('Register', 'altasneem'); ?></a></p>
        </div>
      </div>
      <div class="auth-form register-auth-form">
        <div class="modal-wrapper"> 
          <?php echo do_shortcode('[theme-my-login action="register"]'); ?>
        </div>
        <div class="modal-footer">
          <div class="or">
            <hr><span><?php _e('Or', 'altasneem'); ?></span>
          </div>
          <p><?php _e('Already have an account?', 'altasneem'); ?><a href="#" data-form="login"><?php _e('Login', 'altasneem'); ?></a></p>
        </div>
      </div> 
      <div class="auth-form lostpassword-auth-form">
        <div class="modal-wrapper">
          <?php echo do_shortcode('[theme-my-login action="lostpassword"]'); ?>
        </div>
        <div class="modal-footer">
          <div class="or">
            <hr><span><?php _e('Or', 'altasneem'); ?></span>
          </div>
          <p><?php _e('Back to', 'altasneem'); ?> <a href="#" data-form="login"><?php _e('Login', 'altasneem'); ?></a></p>
        </div>
      </div>
    </div>
  </div>
</div>