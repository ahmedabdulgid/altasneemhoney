 <form class="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
   <div class="searchform-container">
     <input class="search_query" type="search" id="search_query_top" placeholder="<?php _e('Search here...', 'altasneem') ?>" name="s" value="<?php the_search_query(); ?>">
     <button type="submit" class="btn btn-primary"><?php echo get_theme_icon('images/icons/search.svg') ?></span></button>
   </div>
 </form>