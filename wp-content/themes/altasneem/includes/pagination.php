<!-- Start Pagination  -->
<div class="pagination-block">
  <?php
  if (is_rtl()) {
    $args_paginate = array(
      'prev_text'          => __('«'),
      'next_text'          => __('»')
    );
  } else {
    $args_paginate = array(
      'prev_text'          => __('»'),
      'next_text'          => __('«')
    );
  }
  echo paginate_links($args_paginate);
  ?>
</div> 
<!-- End Pagination -->

