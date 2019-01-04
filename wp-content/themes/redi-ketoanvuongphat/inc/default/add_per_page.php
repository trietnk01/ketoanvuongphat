<?php 
// ----------------------------------------
//show total posts in page search
// -----------------------------------------

//add_filter('pre_get_posts', 'p_total_post_size'); 
function p_total_post_size($query) {
    if ( $query->is_search ) {
        $query->query_vars['posts_per_page'] = 12; 
    } 

     if ( $query->is_category ) {
      // $term = get_queried_object();
      // $template_category = get_field('template_category', $term) ? get_field('template_category', $term) : "t1";


      //  if ( $template_category != "t2" ){
      //       $query->query_vars['posts_per_page'] = 10; 
      //  } else {
      //     $query->query_vars['posts_per_page'] = 20; 
      //  }

       if ( is_home() ) {
         $query->query_vars['posts_per_page'] = 16; 

       } else {

         $query->query_vars['posts_per_page'] = 8; 
       }
      
    } 

    // if( $query->is_tax == "cate_sanpham" ) {
    //   $query->query_vars['posts_per_page'] = 10;
    // }

    // if ( $query->is_author ){
    //    $query->query_vars['posts_per_page'] = 10; 
    // }

    return $query; 
}


