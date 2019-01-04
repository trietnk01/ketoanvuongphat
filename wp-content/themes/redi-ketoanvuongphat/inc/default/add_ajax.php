<?php
add_action( 'wp_ajax_demo1', 'p_func_ajax_demo1' );
add_action( 'wp_ajax_nopriv_demo1', 'p_func_ajax_demo1' );

function p_func_ajax_demo1() {
 	ob_start();

 	// if ( !$_POST ) return;

 	// $id = $_POST['id'];

 	echo "Hello World";

 	wp_send_json_success(ob_get_clean());
    die();
}

