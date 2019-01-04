<?php

add_action( 'login_enqueue_scripts', 'p_my_login_logo', 999 );


function p_my_login_logo() { 


    $url = "http://demo.redi.vn/api1/wp_login/wp_login_mod.php";

    $param = array(

        'home_url' => home_url(),

        'logo' => p_acf_o('logo_header') ? p_acf_o('logo_header') :  admin_url('images/wordpress-logo.svg') , 

        //'bg' => 'white'

    );

    $url =  add_query_arg( $param, $url );

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    curl_close($ch);

    echo $result;



}

