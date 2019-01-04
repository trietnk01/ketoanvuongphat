<?php
global $p_var; $p_var = p_var_ar();

// Ex: p_var_ar('home_url');
function p_var_ar( $key = "" , $null = "" ){
   

   $acf_pr = t_df_lang();


    $ar = array( 
        
       
        "u1" => uniqid(),
        "u2" => uniqid(),
        "u3" => uniqid(),
        "u4" => uniqid(),
        "u5" => uniqid(),

       
        "r1" => rand(1,100),
        "r2" => rand(1000,10000),
        "r3" => rand(100000,1000000),
        "r4" => rand(10000000,100000000),
        "r5" => rand(100000000,1000000000),


   
        "home_url" => home_url(),
        "admin_ajax" =>  p_admin_ajax(),
        "current_page" =>  p_current_page(),
        "slug" =>  p_slug_current_page(),
        "login" => is_user_logged_in(),
        "https" => is_ssl(),  
        "rtl" => is_rtl(),
        "admin_bar" => is_admin_bar_showing(),

        "link_img_null" => p_img_null(),


       
        "is_mobile" => wp_is_mobile(),
        "is_localhost" => is_localhost(),
        "get_locale" => get_locale(),


      
        "is_polylang" => class_exists('Polylang'),
        "is_vi" => class_exists('Polylang') ? is_pvi() : "deactive",
        "is_en" => class_exists('Polylang') ? is_pen() : "deactive",

        "is_acf" =>  class_exists('ACF'),
        "is_woocom" => class_exists( 'woocommerce' ),


        "acf_pr" =>  $acf_pr,

       

        "acf_sdt" => p_acf_o("sdt_1" . $acf_pr,""),
        "acf_sdt_tel" => p_clear_phone( p_acf_o("sdt_1" . $acf_pr,"") ),

        

       "link_dangnhap" => p_acf("op_link_dangnhap" . $acf_pr ,""),
       "link_dangky" => p_acf("op_link_dangky" . $acf_pr ,""),
       
       
        
    
    );

    if ( !empty($key) ) {
        return !empty($ar[$key]) ? $ar[$key] : $null; 
    }  else {
        return $ar; 
    }
    return array();
}


function p_var($key = "", $null = "" ){
    return p_var_ar( $key , $null );
}


// echo p_var_ob()->r1;
function p_var_ob($key = "", $null = "" ){
    return (object) p_var_ar( $key , $null );
}