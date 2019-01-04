<?php
add_action( 'wp_dashboard_setup', 'p_example_add_dashboard_widgets',  999999999999 );

function p_example_add_dashboard_widgets() {

 remove_meta_box('dashboard_primary', 'dashboard', 'normal');

add_meta_box(
    'theme_db_metabox',   
    '<div class="func_curl_news_post_title">
      Tin tức và sự kiện về Redi
    </div>' , 
    'p_func_curl_news_post',
    'dashboard',
    'side', 
    'high'
  );

}

function p_func_curl_news_post() {

  $url = 'http://demo.redi.vn/api1/redi_api_post.php'; 
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  echo $result;

}

