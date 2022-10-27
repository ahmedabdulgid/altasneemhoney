 <?php 
  $location = get_field('location', 'option');
  $email = get_field('email', 'option');
  $mobile = get_field('mobile', 'option');
  $whatsapp = get_field('whatsapp', 'option'); 


  ?>
<!-- Start App Menu -->
<aside id="menu-main" class="app-menu">
  <div class="app-menu__offcanvas">
    <div class="app-menu__container">
      <div class="app-menu__header">
        <div class="header-logo">
          <h2><?php _e('Menu', 'altasneem') ?></h2>
        </div>
        <div class="close-menu" data-dismiss="menu">
          <?php echo get_theme_icon('images/icons/times.svg') ?>
        </div>
      </div>
      <div class="app-menu__inner"> 
        <nav class="main-menu-vr">
          <?php main_menu() ?> 
        </nav>
		  <div class="app-menu_info">
          
           <div class="item"> 
             <ul class="contact_info">
				  <?php if ($location['address']) : ?>
				 <li><a href="#"><?php echo get_theme_icon('images/icons/map-marker-alt.svg') ?><?php echo $location['address']; ?></a></li>
             <?php endif; ?>
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
             <h5><?php _e('Follow us', 'altasneem') ?></h5>
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
  </div>
</aside>
<!-- End App Menu -->