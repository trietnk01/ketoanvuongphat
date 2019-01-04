<?php
// ------------------------------------------------
// check active plugin woocom ?
// ------------------------------------------------
if ( ! function_exists( 'p_is_woocommerce_activated' ) ) {
	function p_is_woocommerce_activated() {
		return class_exists( 'woocommerce' );
	}
}


// ------------------------------------------------
// Check page category - chuyen muc - danh muc san pham
// ------------------------------------------------
function p_is_product_archive() {
	if ( p_is_woocommerce_activated() ) {
		if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}