<?php
// -------------------------------
//  Load support
// -------------------------------
add_action('init','p_load_support');
function p_load_support(){

    // load textdomain
    //load_theme_textdomain( TDM , p_DIR . '/languages' );

    add_theme_support( 'automatic-feed-links');
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' ); // Support Thumbnail Page
    add_post_type_support( 'page', 'excerpt' ); // Support The Exerpt Page
    
    // Woocom
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Refresh wg
    add_theme_support( 'customize-selective-refresh-widgets' );

    register_nav_menus(
        array(
            'primary'    => __( 'Primay Menu', TDM  ),
            'mobile'  => __( 'Mobile Menu', TDM  ),
        )
    );

}

// -------------------------------
// Support Reply
// -------------------------------
add_action( 'wp_enqueue_scripts', 'p_enqueue_comment_reply' );
function p_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        wp_enqueue_script( 'comment-reply' ); 
    }
}


// -------------------------------
// Sumon color picker -> add js color picker 
// -------------------------------
add_action( 'admin_enqueue_scripts', 'p_enqueue_color_picker' );
function p_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// -------------------------------
// Add data attr enabled color picker
// -------------------------------
add_action('admin_head','p_add_wpcolorpicker');
function p_add_wpcolorpicker(){
    ?>  
        <script type="text/javascript">
            jQuery(function($) {
                 $('[data-p-color-picker]').wpColorPicker();
            });
        </script>
    <?php
}