<?php
add_filter('display_post_states', 'ptheme_wpsites_custom_post_states', 10, 2);

function ptheme_wpsites_custom_post_states($states) { 
    global $post; 

  	if (  'page' == get_post_type( $post->ID ) || 'post' ==  get_post_type( $post->ID ) )  {

  		switch (get_page_template_slug( $post->ID )) {

  	
        case "template-login.php";
        $states[] = "Login";
        break;

        case "template-register.php";
        $states[] = "Register";
        break;


        case "template-forgot-password.php";
        $states[] = "Forgot Password";
        break;


  		}

    } 

    // if (  'booking' == get_post_type( $post->ID )  )  {

    //     global $wp_query;

    //     $categories = get_the_terms( $post->ID, 'cate_booking' );

    //     if (   $categories  ) {
          
    //       foreach ( $categories as $categorie ){
    //         $cat_name = $categorie->name;
    //         $cat_id = $categorie->term_id;

    //         $cat_obj = $wp_query->get_queried_object();

    //         $cat_id_col =  get_field( 'cat_col' , $cat_obj->taxonomy.'_'.  $cat_id  );

    //         $states[] = "<span style='color:".$cat_id_col."'>" . $cat_name   . "</span>" ;


    //       } 

    //     }
    // } 



    return $states;
    
} 

