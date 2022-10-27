<?php
 
function login_form()
{
   if (is_admin()) return;
   if (is_user_logged_in()) return;
   ob_start();
   woocommerce_login_form(array('redirect' => ''));
   return ob_get_clean();
}
add_shortcode('scope_login_form', 'login_form');

function lost_password_form($atts)
{
   return wc_get_template('myaccount/form-lost-password.php', array('form' => 'lost_password'));
}
add_shortcode('scope_lost_password_form', 'lost_password_form');
