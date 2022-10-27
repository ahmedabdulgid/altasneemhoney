<?php add_shortcode('scope_register_form', 'register_form');

function register_form()
{
   if (is_admin()) return;
   if (is_user_logged_in()) return;
   ob_start();

   // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY

   do_action('woocommerce_before_customer_login_form');

?>
   <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

      <?php do_action('woocommerce_register_form_start'); ?>

      <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                     ?>
         </p>

      <?php endif; ?>

      <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
         <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
         <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                      ?>
      </p>

      <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
         </p>

      <?php else : ?>

         <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

      <?php endif; ?>

      <?php do_action('woocommerce_register_form'); ?>

      <p class="woocommerce-form-row form-row">
         <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
         <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
      </p>

      <?php do_action('woocommerce_register_form_end'); ?>

   </form>

<?php

   return ob_get_clean();
}



/**
 * Add the code below to your theme's functions.php file
 * to add a confirm password field on the register form under My Accounts.
 */
function woocommerce_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email)
{
   global $woocommerce;
   extract($_POST);
   if (strcmp($password, $password2) !== 0) {
      return new WP_Error('registration-error', __('Passwords do not match.', 'woocommerce'));
   }
   return $reg_errors;
}
add_filter('woocommerce_registration_errors', 'woocommerce_registration_errors_validation', 10, 3);

function woocommerce_register_form_password_repeat()
{
?>
   <p class="form-row form-row-wide app-field app-field-pass">
      <label class="app-field_label" for="reg_password2"><?php _e('Confirm password', 'woocommerce'); ?> <span class="required">*</span></label>
      <input type="password" class="app-field_input input-text" name="password2" placeholder="<?php _e('Confirm password', 'woocommerce'); ?> " id="reg_password2" value="<?php if (!empty($_POST['password2'])) echo esc_attr($_POST['password2']); ?>" />
   </p>
<?php
}
add_action('woocommerce_register_form', 'woocommerce_register_form_password_repeat');
