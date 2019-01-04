<?php 

/*
    acf function
*/

// acf field


// ---------------
// new
// --------------
function p_acf_o($f="",$f2=""){
    if( ! class_exists('ACF') ) return $f2;
    if ( empty($f) ) return;

    return ( !empty( get_field( $f, "option" ) ) ) ? get_field( $f, "option" ) : $f2;
}

function p_acfs_o($f="",$f2=""){
    if( ! class_exists('ACF') ) return $f2;
    if ( empty($f) ) return;

    return ( !empty( get_sub_field( $f, "option" ) ) ) ? get_sub_field( $f, "option" ) : $f2;
}


function p_acf_pp($f="",$f2=""){
    if( ! class_exists('ACF') ) return $f2;
    if ( empty($f) ) return;

    return ( !empty( get_field( $f ) ) ) ? get_field( $f ) : $f2;
}

function p_acfs_pp($f="",$f2=""){
    if( ! class_exists('ACF') ) return $f2;
    if ( empty($f) ) return;

    return ( !empty( get_sub_field( $f ) ) ) ? get_sub_field( $f ) : $f2;
}

// ---------------
// old
// --------------
function p_acf($f="",$f2="",$option="option",$type=false){
    if( ! class_exists('ACF') ) return $f2;

    if ( empty($f) ) return;

    if($option == "") $option = "option";

    if ( $type  ) {
        return !empty(get_field($f, $option)) ? get_field($f, $option)[$type] : $f2;
    }

    return !empty(get_field($f, $option)) ? get_field($f, $option) : $f2;
}


function p_acfp($f="",$f2="",$option="",$type=false){
    if( ! class_exists('ACF') ) return $f2;

    if ( empty($f) ) return;

    if($option == "") $option = "";

    if ( $type  ) {
        return !empty(get_field($f, $option)) ? get_field($f, $option)[$type] : $f2;
    }

    return !empty(get_field($f, $option)) ? get_field($f, $option) : $f2;
}



// acf sub
function p_acf_s($f="",$f2="",$option="option",$type=false){
    if( ! class_exists('ACF') ) return $f2;

    if ( empty($f) ) return;

    if($option == "") $option ="option";
    if ( $type  ) {
        return !empty(get_sub_field($f, $option)) ? get_sub_field($f, $option)[$type] : $f2;
    }
    return !empty(get_sub_field($f, $option)) ? get_sub_field($f, $option) : $f2;
}


function p_acfp_s($f="",$f2="",$option="",$type=false){
    if( ! class_exists('ACF') ) return $f2;

    if ( empty($f) ) return;

    if($option == "") $option = "";
    if ( $type  ) {
        return !empty(get_sub_field($f, $option)) ? get_sub_field($f, $option)[$type] : $f2;
    }
    return !empty(get_sub_field($f, $option)) ? get_sub_field($f, $option) : $f2;
}
