<?php
add_action( 'wp_ajax_func_ajax_scription', 'func_ajax_scription' );
add_action( 'wp_ajax_nopriv_func_ajax_scription', 'func_ajax_scription' );

function func_ajax_scription() {

  ob_start();

  if ( !$_POST ) return;

  $email = $_POST['email'];

  $list_subscription = get_option( "p_list_subscription");

    
    if ( in_array( $email, $list_subscription  )  ){

      echo "same";
      wp_send_json_success(ob_get_clean());
      die();//bắt buộc phải có khi kết thúc;
    }

    $rand_st = generateRandomString(30);

    set_transient( 'nhantintuc_' . $email , $rand_st , 1 * HOUR_IN_SECONDS );



  $link =  trailingslashit( home_url() ) . "?active=" . $rand_st;
  

  $subject = t_pll("Đăng ký nhận bản tin","Sign up for the newsletter");

  if ( is_pvi() ) {

    $message = "Bạn vui lòng xác nhận đăng ký theo dõi tin tức tại đây nhé !\n
    Link xác nhận: $link";

  } else {

      $message = "Please confirm your subscription here! \n
      Confirmation link: $link";

  }


  wp_mail( $email, $subject, $message );

  echo "1";
  wp_send_json_success(ob_get_clean());
  die();//bắt buộc phải có khi kết thúc

}


function check_email_nhantintuc($key){
  if ( empty( $key )  ) return;

  $return_option_name = p_return_option_name( $key );

  $get_email_db_df = $return_option_name;


    if ( empty( $get_email_db_df ) ) {

      $kq = check_email_fail();

    } else {

      $kq = check_email_active();
      delete_transient( $return_option_name );
      
      $list_subscription = get_option( "p_list_subscription");

      echo "123s" .  $get_email_db_df;


      $email_replace = str_replace( "_transient_nhantintuc_" , "", $get_email_db_df);

      if ( !in_array( $email_replace , $list_subscription  ) ) {

          $list_subscription[] = $email_replace;
          update_option( "p_list_subscription" , $list_subscription , no );

      }

    }

    return $kq;
}

// echo return_option_name("1528811685");
function p_return_option_name($option_value = "" ){
  if ( empty($option_value) ) return;

  global $wpdb;

  $option_name = "";

  $wpdb_option = $wpdb->prefix . "options";

  $datas = $wpdb->get_results(
    "SELECT option_name FROM $wpdb_option where option_value = '$option_value'"
  );

  foreach( $datas as $data ){
    $option_name = $data->option_name;
  }

  return $option_name;
}




function check_email_active(){
  ob_start();
  ?>

  <script>
      jQuery(function($){


          $('.box-complete-overlay').addClass('active'); 
          $('.box-complete').addClass('show');

          $('.box-complete-detail-wrap').addClass('hidden');
          $('.box-complete-check_email_active').removeClass("hidden");

      })
  </script>

  <?php
  return ob_get_clean();
}


function check_email_fail(){
  ob_start();
  ?>
    <script>
      jQuery(function($){


          $('.box-complete-overlay').addClass('active'); 
          $('.box-complete').addClass('show');


          $('.box-complete-detail-wrap').addClass('hidden');
          $('.box-complete-check_email_fail').removeClass("hidden");


      })
    </script>

  <?php
  return ob_get_clean();

}


