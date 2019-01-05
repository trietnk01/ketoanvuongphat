<?php
// Load css
add_action('wp_enqueue_scripts','p_load_css_js');
if(!function_exists('p_load_css_js')){
    function p_load_css_js(){    
        global $wp_scripts;   
        $js_css_ran = rand(1000,100000);
        // begin html5shiv
        wp_enqueue_script('html5shiv', P_LIB . '/html5/html5shiv-printshiv.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        $wp_scripts->add_data("html5shiv", "conditional", "lt IE 9"); 
        wp_enqueue_script('respond', P_LIB . '/html5/respond.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        $wp_scripts->add_data("respond", "conditional", "lt IE 9");         
        // end html5shiv
        //normalize
        wp_enqueue_style('normalize',P_LIB . '/normalize/normalize-4.2.0.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        //begin bootstrap
        wp_enqueue_style('bootstrap_css',P_LIB . '/bootstrap-4/css/bootstrap.min.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        wp_enqueue_script('bootstrap_js', P_LIB . '/bootstrap-4/js/bootstrap.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        //end bootstrap
        // begin jquery-ui
        wp_enqueue_style('jquery-ui-css',P_LIB . '/jquery/jquery-ui.min.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        wp_enqueue_script('jquery-ui-js', P_LIB . '/jquery/jquery-ui.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end jquery-ui      
        // begin font-awesome
        wp_enqueue_style('font-awesome',P_LIB . '/font-awesome-4.7.0/css/font-awesome.min.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        // end font-awesome
        // begin animate
        wp_enqueue_style('animate',P_LIB . '/animated/animate-3.5.2.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        // end animate        
        // begin simplelightbox
        wp_enqueue_style('lightbox-css', P_LIB . '/simpleLightbox/simplelightbox.min.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');       
        wp_enqueue_script('lightbox-js',P_LIB . '/simpleLightbox/simple-lightbox.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end simplelightbox        
        // begin modal video
        wp_enqueue_style('modalvideo',P_LIB . '/modalvideo/css/modal-video.min.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        wp_enqueue_script('modalvideo',P_LIB. '/modalvideo/js/jquery-modal-video.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end modal video        
        // begin owlcarousel2-2.2
        wp_enqueue_style('owl-min', P_LIB . '/owlcarousel2-2.2.1/owl.carousel.min.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        wp_enqueue_style('owl-themes', P_LIB . '/owlcarousel2-2.2.1/owl.theme.default.min.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        wp_enqueue_script('owl-js', P_LIB . '/owlcarousel2-2.2.1/owl.carousel.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end owlcarousel2-2.2
        // begin wow.min
        wp_enqueue_script('wow.min',P_LIB . '/wow/wow.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end wow.min
        // begin counterup
        wp_enqueue_script('counterup.min',P_LIB . '/counterup/jquery.counterup.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        wp_enqueue_script('waypoints.min',P_LIB . '/counterup/waypoints.min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end counterup
        // begin scroll-top
        wp_enqueue_script('scroll-top',P_ASSETS . '/js/scroll_top.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end scroll-top
        // start ddsmoothmenu
        wp_enqueue_script('ddsmoothmenu_js',P_LIB . '/ddsmoothmenu/js/ddsmoothmenu.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,false);
        wp_enqueue_style('ddsmoothmenu_css', P_LIB . '/ddsmoothmenu/css/ddsmoothmenu.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all'); 
        // end ddsmoothmenu
        // begin matchHeight-min
        wp_enqueue_script('jquery.matchHeight-min',P_LIB . '/jquery/jquery.matchHeight-min.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end matchHeight-min
        // begin  carousel-pro
        wp_enqueue_script('carousel-pro',P_ASSETS . '/js/carousel-pro.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        // end   carousel-pro            
        wp_enqueue_style('pcss', P_SCSS . '/pcss.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');  
        // begin alo_phone               
        wp_enqueue_style('alophonecss',P_LIB . '/alophone/css/callnow.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        // end alo_phone
        // begin custom       
        wp_enqueue_script('stylecustomjs',P_ASSETS . '/js/style-custom.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);
        wp_enqueue_style('stylecss',P_SCSS . '/style.css?ver2='.$js_css_ran,array(),@$js_css_ran,'all');
        // end custom
        // begin style       
        wp_enqueue_script('stylefuncjs',P_ASSETS . '/js/style-func.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);                      
        wp_enqueue_script('stylesubjs',P_INC . '/subscription/style-sub.js?ver2='.$js_css_ran,array('jquery'),@$js_css_ran,true);             
        // end style
    }
}   