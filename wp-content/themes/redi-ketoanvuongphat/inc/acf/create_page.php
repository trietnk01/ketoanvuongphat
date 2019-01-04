<?php
/*
	acf create page
*/
if( ! class_exists('ACF') ) return;

//if ( p_get_current_user_role() == "subscriber" ) return;

// create page

acf_add_options_page(array(
	'page_title' 	=> 'PAGE Option',
	'menu_title'	=> 'PAGE Option',
	'menu_slug' 	=> 'p-option-page',
	'capability'	=> 'edit_posts',
	'redirect'		=> admin_url('admin.php?page=page_option') ,
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'PAGE Option',
	'menu_title'	=> 'PAGE Option',
	'menu_slug' 	=> 'page_option',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'HomePage',
	'menu_title'	=> 'HomePage',
	'menu_slug' 	=> 'home_page',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Banner',
	'menu_title'	=> 'Banner',
	'menu_slug' 	=> 'banner',
	'parent_slug'	=> 'p-option-page',
));
acf_add_options_sub_page(array(
	'page_title' 	=> 'Footer',
	'menu_title'	=> 'Footer',
	'menu_slug' 	=> 'footer',
	'parent_slug'	=> 'p-option-page',
));