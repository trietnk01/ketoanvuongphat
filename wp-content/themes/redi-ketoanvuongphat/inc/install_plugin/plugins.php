<?php 
/*
	Install plugin
*/

function p_install_plugin(){

	$plugins = array(
		array(
			'name' => 'Yoast SEO',
			'slug' => 'wordpress-seo',
			'require' => true
		),
		array(
			'name' => 'kk Star Ratings',
			'slug' => 'kk-star-ratings',
			'require' => true
		),

		array(
			'name' => 'AddToAny Share Buttons',
			'slug' => 'add-to-any',
			'require' => true
		),

		array(
			'name' => 'Better Search Replace',
			'slug' => 'better-search-replace',
			'require' => true
		),

		array(
			'name' => 'Regenerate Thumbnails',
			'slug' => 'regenerate-thumbnails',
			'require' => true
		),

		array(
			'name' => 'Contact From 7',
			'slug' => 'contact-form-7',
			'require' => true
		),
		

		array(
			'name' => 'WordPress Importer',
			'slug' => 'wordpress-importer',
			'require' => true
		),

		
		array(
			'name' => 'TinyMCE Advanced',
			'slug' => 'tinymce-advanced',
			'require' => true
		),

		array(
			'name' => 'WooCommerce',
			'slug' => 'woocommerce',
			'require' => true
		),

		array(
			'name' => 'Speed Booster Pack',
			'slug' => 'speed-booster-pack',
			'require' => true
		),
		
		array(
			'name' => 'WP Super Cache',
			'slug' => 'wp-super-cache',
			'require' => true
		),

	
			
	);

	$configs = array(
		'menu' => 'p_install_plugin',
		'has_notice' => true,
		'dississable' => false,
		'is_automatic' => true
	);
	tgmpa($plugins, $configs);

}	
add_action('tgmpa_register', 'p_install_plugin');
