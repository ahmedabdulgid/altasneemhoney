 <?php
  $logo = get_field('logo', 'option');
  $location = get_field('location', 'option');
  $email = get_field('email', 'option');
  $mobile = get_field('mobile', 'option');
  $whatsapp = get_field('whatsapp', 'option');
  $wishlist_page = get_field('wishlist_page', 'option');


  ?>

 <!-- Start gallery -->
 <section id="gallery-carousel" class="gallery-carousel">
   <div class="swiper-container">
     <div class="swiper-wrapper">
       <!-- Slides -->
       <?php
        $images = get_field('gallery', 'options');
        $size = 'large'; // (thumbnail, medium, large, full or custom size)
        if ($images) : ?>
         <?php foreach ($images as $image) : ?>
           <div class="swiper-slide">
             <?php echo wp_get_attachment_image($image['id'], array(280,260)); ?>
           </div>
         <?php endforeach; ?>
       <?php endif; ?>
     </div>
   </div>
 </section>
 <!-- End gallery -->


 <footer id="footer" class="footer">
   <div class="footer_wrapper">
     <div class="footer_top">
       <div class="app-container">
         <div class="logo">
           <a href="<?php echo get_bloginfo('url') ?>">
             <?php if ($logo) : ?>
               <img src="<?php echo $logo['url'] ?>" alt="<?php echo get_bloginfo('name') ?>">
             <?php else : ?>
               <h2><?php echo get_bloginfo('name') ?></h2>
             <?php endif; ?>
           </a>
         </div>
         <div class="footer_items">
           <div class="item">
             <h3><?php _e('Address', 'altasneem') ?></h3>
             <?php if ($location['address']) : ?>
               <p><?php echo $location['address']; ?></p>
             <?php endif; ?>
           </div>
           <div class="item">
             <h3><?php _e('Call US', 'altasneem') ?></h3>
             <ul class="call_us">
               <?php if ($mobile) : ?>
                 <li><a href="tel:<?php echo $mobile; ?>"><?php echo get_theme_icon('images/icons/mobile-alt.svg') ?><?php echo $mobile; ?></a></li>
               <?php endif; ?>
               <?php if ($whatsapp) : ?>
                 <li><a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>"><?php echo get_theme_icon('images/icons/whatsapp.svg') ?><?php echo $whatsapp; ?></a></li>
               <?php endif; ?>
               <?php if ($email) : ?>
                 <li><a href="mailto:<?php echo $email; ?>"><?php echo get_theme_icon('images/icons/envelope.svg') ?><?php echo $email; ?></a></li>
               <?php endif; ?>
             </ul>
           </div>
           <div class="item">
             <h3><?php _e('Follow us', 'altasneem') ?></h3>
             <div class="social-icons">
               <?php if (have_rows('social_networks', 'option')) : ?>
                 <ul>
                   <?php
                    while (have_rows('social_networks', 'option')) :
                      the_row();
                      $icon = get_sub_field('icon', 'option');
                      $url = get_sub_field('url', 'option');
                    ?>
                     <li><a href="<?php echo $url; ?>"><?php echo file_get_contents($icon['url']); ?></a></li>
                   <?php endwhile; ?>
                 </ul>
               <?php endif; ?>
             </div>
           </div>
         </div>
       </div>
     </div>
     <?php if ($location && !is_admin()) : ?>
       <div class="footer_map"> 
		   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13915.629262420352!2d30.8578551!3d29.3143943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd14a45abaae01069!2z2LnYs9mEINmG2K3ZhCDYp9mE2KrYs9mG2YrZhQ!5e0!3m2!1sen!2seg!4v1665659472312!5m2!1sen!2seg"  height="250" style="border: 0;
    width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      
       </div>
     <?php endif; ?>
     <div class="footer_copyright">
       <p><?php echo bloginfo('name') . ' &copy; ' . date('Y') . ' ' .  __('All Rights Reserved.', 'altasneem'); ?></p>
     </div>
   </div>
 </footer>

 <div id="tabbar" lass="tabbar">
   <ul>
     <li class="search">
       <a href="javascript: voild(0);" data-toggle="modal" data-target="#modal-search">
         <?php echo get_theme_icon('images/icons/search.svg') ?>
       </a>
     </li>
     <li class="cart">
       <a href="javascript: voild(0);" class="app-cat-toggle">
         <?php echo get_theme_icon('images/icons/shopping-cart.svg') ?>
         <?php echo do_shortcode("[woo_cart_but]"); ?>
       </a>
     </li>
     <li class="home">
       <a href="<?php echo get_bloginfo('url') ?>">
         <?php echo get_theme_icon('images/icons/home.svg') ?>
       </a>
     </li>
     <li class="wishlist">
       <a href="<?php echo $wishlist_page; ?>">
         <?php echo get_theme_icon('images/icons/heart.svg') ?>
         <?php echo do_shortcode("[yith_wcwl_items_count]"); ?>
       </a>
     </li>
     <li class="user">
       <a href="javascript: voild(0);" <?php echo !is_user_logged_in() ? 'data-toggle="modal" data-target="#modal-login"' : 'data-toggle="menu" data-target="#menu-profile"' ?>><?php echo get_theme_icon('images/icons/user.svg') ?></a>
     </li>
   </ul>
 </div>

 </div>
 <?php wp_footer(); ?> 

 </body>

 </html>