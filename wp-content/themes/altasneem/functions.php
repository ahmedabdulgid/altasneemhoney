<?php
/*
 *
 * @package altasneem-theme
 */



/* Define DIR AND URI OF THEME */
define('THEME_PATH', get_template_directory());
define('CHILD_PATH', get_stylesheet_directory());
define('THEME_URI', get_template_directory_uri());



/**
 * Theme Plugins
 */
include_once THEME_PATH . '/core/plugins/class-tgm.php';

/**
 * After Setup theme
 */
add_action('after_setup_theme', 'theme_setup');
if (!function_exists('theme_setup')) :
  function theme_setup()
  {

    /**
     * Load Text Domain
     */
    load_theme_textdomain('elessi-theme', THEME_PATH . '/languages');

    /**
     * Support Thumbnails
     */
    add_theme_support('post-thumbnails');

    /**
     *  Set post thumbnail size
     */
    // set_post_thumbnail_size(1200, 9999);

    /**
     *  Set Sizes
     */

    add_image_size('member_avatar', 620, 620, true);

    /**
     * Support Excerpt
     */
    add_post_type_support('page', 'excerpt');

    /**
     * Register Menus
     */
    register_nav_menus(
      array(
        'main-menu' => 'Main',
        // 'sidebar-menu' => 'Sidebar',
      )
    );
    /**
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    /**
     * Enable support for Post Formats.
     */
    add_theme_support('post-formats', array(
      'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ));

    /** 
     * Woocommerce
     */
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    /* Disable WordPress Admin Bar for all users */
    add_filter('show_admin_bar', '__return_false');


    /**
     * Load translations
     */
    load_theme_textdomain('altasneem', get_template_directory() . '/languages');

    /**
     * enqueue comments
     */
    add_action('wp_enqueue_scripts', 'enqueue_comment_reply');
    function enqueue_comment_reply()
    {
      // on single blog post pages with comments open and threaded comments
      if (is_singular() && comments_open() && get_option('thread_comments')) {
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script('comment-reply');
      }
    }
    // Hook into wp_enqueue_scripts

    /**
     * Move Fields comments
     */

    add_filter('comment_form_fields', 'move_comment_field_to_bottom');
    function move_comment_field_to_bottom($fields)
    {
      $comment_field = $fields['comment'];
      unset($fields['comment']);
      $fields['comment'] = $comment_field;

      $cookies_field = $fields['cookies'];
      unset($fields['cookies']);
      $fields['cookies'] = $cookies_field;
      return $fields;
    }

  }
endif; // theme_setup
/**
 * Theme Scripts
 */
include_once THEME_PATH . '/core/theme-scripts.php';

/**
 * Theme Opions Pages
 */
include_once THEME_PATH . '/core/options-page.php';

/**
 * Theme Functions
 */
include_once THEME_PATH . '/core/theme-functions.php';

/**
 * Theme Fields
 */
include_once THEME_PATH . '/core/fields.php';

/**
 * Theme Blocks
 */
include_once THEME_PATH . '/core/blocks.php';

/**
 * Theme Cart
 */
include_once THEME_PATH . '/core/cart.php';

/**
 * Theme Withlist
 */
include_once THEME_PATH . '/core/wishlist.php';

/**
 * Theme Ecommerce
 */
include_once THEME_PATH . '/core/ecommerce.php';

/**
 * Theme Widgets
 */
include_once THEME_PATH . '/core/widgets.php';


/*
* Auth
*/

// require_once THEME_PATH . '/core/auth/auth.php';
// 
add_action('woocommerce_single_product_summary', 'download_products');

function download_products()
{

    $downloads = array();
    $user_id = get_current_user_id();
    $downloads = wc_get_customer_available_downloads($user_id);
    if (!empty($downloads)) {
        foreach ($downloads as $download) {
            echo '<a href="' . $download['download_url'] . '" class="btn btn-primary">Download</a>';
			echo '<video width="320" height="240" controls style="display:block">
  <source src="'.$download['download_url'].'" type="video/mp4"> 
Your browser does not support the video tag.
</video>';  
			
        }
    }

}
add_filter( 'woocommerce_is_purchasable', 'bbloomer_hide_add_cart_if_already_purchased', 9999, 2 );
 
function bbloomer_hide_add_cart_if_already_purchased( $is_purchasable, $product ) {
   if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
      $is_purchasable = false;
   }
   return $is_purchasable;
}

