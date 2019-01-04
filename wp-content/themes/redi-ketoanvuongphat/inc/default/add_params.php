<?php
/*
	add params
*/

add_action( 'init', 'p_pa_add_params1' );
function p_pa_add_params1(){

    //( !is_localhost() ) return;

	if ( isset( $_GET['clear']) && !is_localhost() ){
		
		// WC()->cart->empty_cart(); 
		// wp_redirect( home_url() ); 
	 	// exit;


	}

}

