<?php
/*
* Theme Scripts
*/

function theme_scripts()
{
  if (!is_admin()) {
    if (get_bloginfo('language') == 'ar') {
      wp_enqueue_style('fonts-google', 'https://fonts.googleapis.com/css?family=Tajawal:400,700&display=swap&subset=arabic'); // Include Fonts Google
      wp_enqueue_style('main-style-rtl', get_template_directory_uri() . '/assets/dist/css/app-rtl.min.css', array(), '1.0.0');
//       wp_enqueue_style('style-rtl', get_template_directory_uri() . '/style-rtl.css', array(), '1.0.0');
    } else {
      wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/dist/css/app.min.css', array(), '1.0.0');
    }
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.3');
    wp_register_script("script", get_template_directory_uri() . '/assets/dist/js/app.min.js', array('jquery'), '1.0.0', true); // Include Main JavaScript 
    wp_enqueue_script('script');
  }
}

add_action('wp_enqueue_scripts', 'theme_scripts');

 

function add_this_script_footer(){  
?>
<script>
// App loaderd

(function () {
  window.addEventListener("DOMContentLoaded", () => {
    const appPreloader = document.getElementById("app-preloader");
    setInterval(() => {
      document.body.classList.add("paga-loaded"); 
      if (appPreloader) {
        appPreloader.classList.add("preloader-hide");
		   
        setInterval(() => {
         appPreloader.style.display = "none";
        }, 150);
      }
    }, 200);
  });
})();
</script>
<?php
 } 

add_action('wp_footer', 'add_this_script_footer'); 