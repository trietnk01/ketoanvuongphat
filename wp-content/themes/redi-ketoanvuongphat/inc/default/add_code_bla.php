<?php

// -----------------------------------
// End head
// -----------------------------------

add_action("p_add_code_head","p_add_code_head1");
function p_add_code_head1(){
	?>
		
	<?php if ( is_user_logged_in() && is_admin_bar_showing() ){  ?>
      <!--   <style type="text/css">
  
       .header.fixed{
            margin-top: 32px;
       }
    
        </style> -->

    <?php } ?>


    <?php 
    if( !is_localhost()) {
		echo "\n\n";
		echo p_acf("google_ana");

		echo "\n\n";
		echo p_acf("web_master_tool");

		echo "\n\n";
		echo p_acf("tag_manager_head");

		echo "\n\n";
		echo p_acf("pinterest_code");

		echo "\n\n";
		echo p_acf("twitter_code");

		echo "\n\n";
		echo p_acf('code_header');

		
	}		

	?>


	<?php
}


// -----------------------------------
// start body
// -----------------------------------
add_action("p_add_code_start_body","p_add_code_start_body1");
function p_add_code_start_body1(){
	// fb
	echo p_fb_load();
	
	if( !is_localhost()) {

		echo "\n\n";
		echo p_acf("tag_manager_body"); 
		echo "\n\n";


	}
	
}



// -----------------------------------
// End body
// -----------------------------------
add_action("p_add_code_end_body","p_add_code_end_body1");
function p_add_code_end_body1(){
	

	if( !is_localhost()) {

		echo "\n\n"; 
		echo p_acf('code_footer'); 
		echo "\n\n";

		
	}

}