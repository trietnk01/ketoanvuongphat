<?php
//session 

//add_action( 'init', 'p_se_add_session' );
function p_se_add_session(){

    if( !session_id() ) {
        session_start();
        // $_SESSION['pro_id'] = [];
        // $_SESSION['qty'] = [];

        if (!isset($_SESSION['cart_id_related'])){
            $_SESSION['cart_id_related'] = [];


            // $_SESSION['cart_id_related']['vi'] = [];
            // $_SESSION['cart_id_related']['en'] = [];
        }
    }

}

//add_action( 'init', 'p_se_clear_session' );
function p_se_clear_session(){

    if ( !is_localhost() ) return;

	if ( isset( $_GET['clearss']) ){
		 $_SESSION['cart_id_related'] = [];

         // $_SESSION['cart_id_related']['vi'] = [];
         // $_SESSION['cart_id_related']['en'] = [];

	}

}


