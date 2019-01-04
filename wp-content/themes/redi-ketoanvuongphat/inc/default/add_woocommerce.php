<?php
/*
Function woocommerece
*/


// ------------------
// Shortcode kiem tra don hang
// ---------------------

// [woocommerce_order_tracking]


// ------------------------------------------------
// Hidden caption of image photoswipe
// ------------------------------------------------
// add_action('wp_head','p_wc_hide_caption');
// function p_wc_hide_caption(){
// 	echo "<style type='text/css'>";
// 	echo ".pswp__caption__center{ display:none}";
// 	echo "</style>";
// }


// ------------------------------------------------
// Paypal Support VND
// ------------------------------------------------
add_filter( 'woocommerce_paypal_supported_currencies', 'p_wc_enable_custom_currency' );
function p_wc_enable_custom_currency($currency_array) {
	$currency_array[] = 'VND';
	return $currency_array;
}


// ------------------------------------------------
// functions clear cart woocommerce 
// ------------------------------------------------
add_action( 'init', 'p_wc_clear_cart_url' );
function p_wc_clear_cart_url() {

    if ( isset( $_GET['clear-cart'] ) ) {
    	WC()->cart->empty_cart(); 
		  wp_redirect( home_url() ); 
	   	exit;
    }
}


// ------------------------------------------------
// functions remove order comment
// ------------------------------------------------

// add_filter( 'woocommerce_checkout_fields' , 'alter_woocommerce_checkout_fields' );
// function alter_woocommerce_checkout_fields( $fields ) {
//      unset($fields['order']['order_comments']);
//      return $fields;
// }



// ------------------------------------------------
// functions remove taxonomy tag
// ------------------------------------------------

//add_action('init', 'p_wc_remove_tag_taxonomy',100);
// function p_wc_remove_tag_taxonomy(){
//    unregister_taxonomy('product_tag');
// }




// ------------------------------------------------
// hidden var of admin product
// ------------------------------------------------

//add_action("admin_footer","p_wc_remove_pd_type_var");
function p_wc_remove_pd_type_var(){

    $pt = get_current_screen()->post_type;
    if ( $pt != 'product' ) return;

  ?>  
    <style>
      option[value="grouped"],
      option[value="external"],
      option[value="variable"]{
        display: none !important;
      }
    </style>

  <?php 
}




// ------------------------------------------------
// total product per row page, 1 hang bao nhieu product ?
// ------------------------------------------------

// add_filter('loop_shop_columns', 'p_wc_loop_columns');
// function p_wc_loop_columns() {
// 	return 3; 
// }



// ------------------------------------------------
// total product per page
// ------------------------------------------------

// add_filter( 'loop_shop_per_page', 'p_wc_new_loop_shop_per_page', 20 );
// function p_wc_new_loop_shop_per_page( $cols ) {
//   return 9;
// }




// ------------------------------------------------
// link cart
// ------------------------------------------------

function p_wc_link_cart(){
  return get_permalink( wc_get_page_id( 'cart' ) );
}


// ------------------------------------------------
// count cart
// ------------------------------------------------

function p_wc_count_cart(){
  return WC()->cart->cart_contents_count;
}

// ------------------------------------------------
// cureent symbol , vn 
// ------------------------------------------------

function p_wc_get_current_symbol(){
    return  apply_filters( "p_ap_wc_get_current_symbol", get_woocommerce_currency_symbol());
}

function p_wc_get_vn_symbol(){
    return apply_filters( "p_ap_wc_get_vn_symbol(","VNĐ");
}

// ------------------------------------------------
// format price
// ------------------------------------------------

function p_wc_price_format( $price ){
  if ( empty($price) ) return;

  // vn
  return number_format($price,0,",",".");
}


// price html default
function p_wc_price_format_html( $price ){
  if ( empty($price) ) return;

  // vn
  return p_wc_price_format($price) . ' ' . "<span>" . p_wc_get_current_symbol() . "</span>";
}


// price vn
function p_wc_price_format_html2( $price ){
  if ( empty($price) ) return;

  // vn
  return p_wc_price_format($price) . ' ' . "<span>" . p_wc_get_vn_symbol() . "</span>";
}




// ------------------------------------------------
// Check sale - regular - contact
// ------------------------------------------------

function p_wc_pd_check_type( $id ){
  if ( empty($id) ) return;
   
  ob_start();

  $sale = get_post_meta( $id, '_sale_price', true);
  $regular = get_post_meta( $id, '_regular_price', true);

  if ( !empty($sale)  ){
    echo "sale";
  } else {
    if ( !empty($regular) ) {
      echo "df";
    } else {
      echo "contact";
    }
  }

  return ob_get_clean();
}

// ------------------------------------------------
// show % sale of product
// ------------------------------------------------

function p_wc_pd_sale_pt($id){
   if ( empty($id) ) return;
   ob_start();

   $sale = get_post_meta( $id, '_sale_price', true);
   $regular = get_post_meta( $id, '_regular_price', true);

   if ( !empty($sale) && !empty($regular)   ){
      echo round(( $regular - $sale ) / ( $regular / 100 )) ; 
   }

  return ob_get_clean();

}

// ------------------------------------------------
// Show price : sale -> regular -> contact
// ------------------------------------------------

function p_wc_pd_price_sale_regular_contact( $id ){
  if ( empty($id) ) return;
   
  ob_start();

  $sale = get_post_meta( $id, '_sale_price', true);
  $regular = get_post_meta( $id, '_regular_price', true);

  if ( !empty($sale)  ){
   echo p_wc_price_format_html($sale);

  } else {
    if ( !empty($regular) ) {
      echo p_wc_price_format_html( $regular );
    } else {
      echo "Liên hệ";
    }
  }

  return ob_get_clean();
}


// ------------------------------------------------
// Show price : regular -> contact
// ------------------------------------------------

function p_wc_pd_price_regular_contact( $id ){
  if ( empty($id) ) return;
  ob_get_clean();

   $regular = get_post_meta( $id, '_regular_price', true);

  if ( !empty($regular)  ){ ?>

    
    <?php echo p_wc_price_format_html( $regular ); ?>
  

  <?php } else { ?>

   
    Liên hệ
  

  <?php }

  return ob_get_clean();
}

// ------------------------------------------------
// Show price : sale
// ------------------------------------------------

function p_wc_pd_price_sale( $id ){
  if ( empty($id) ) return;
  ob_get_clean();

  $sale = get_post_meta( $id, '_sale_price', true); 

  if ( !empty($sale)  ){ ?>

    
  <?php echo p_wc_price_format_html( $sale ); ?>
  

  <?php }

  return ob_get_clean();
}

// ------------------------------------------------
// Show price : regular
// ------------------------------------------------

function p_wc_pd_price_regular( $id ){
  if ( empty($id) ) return;
  ob_get_clean();

   $regular = get_post_meta( $id, '_regular_price', true);

  if ( !empty($regular)  ){ ?>

   
    <?php echo p_wc_price_format_html( $regular ); ?>
  

  <?php } 
  return ob_get_clean();
}

// ------------------------------------------------
// Show price : contact
// ------------------------------------------------

function p_wc_pd_price_contact ($id ){
  if ( empty($id) ) return;
  ob_get_clean();

   $regular = get_post_meta( $id, '_regular_price', true);
   $sale = get_post_meta( $id, '_sale_price', true); 


  if ( empty($regular) && empty($sale)  ){ ?>

    Liên hệ

  <?php } 
  return ob_get_clean();
}



