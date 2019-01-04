<?php
// ----------------------------------
// Run Shortcode in widget text
// ---------------------------------
add_filter('widget_text', 'do_shortcode');

// ----------------------------------
// Run Shortcode in cf7
// ---------------------------------
add_filter( 'wpcf7_form_elements', 'do_shortcode' );


// ----------------------------------
//* Activate shortcode function in Post Title
// ----------------------------------
add_filter( 'the_title', 'do_shortcode' );
 

// -----------------------------------
// xmlrpc disabled
// -----------------------------------
add_filter('xmlrpc_enabled', '__return_false');


// ------------------------------
//	disable rest_api
// -------------------------------	

//add_action( 'rest_api_init', 'p_disable_rest_api' );
function p_disable_rest_api() {
    
    //if ( is_localhost() ) return;

    wp_redirect( home_url() );
    exit();

}

// ------------------------------
//	disable feed, rss
// -------------------------------	

// add_action('do_feed', 'p_disable_feed', 1);
// add_action('do_feed_rdf', 'p_disable_feed', 1);
// add_action('do_feed_rss', 'p_disable_feed', 1);
// add_action('do_feed_rss2', 'p_disable_feed', 1);
// add_action('do_feed_atom', 'p_disable_feed', 1);
// add_action('do_feed_rss2_comments', 'p_disable_feed', 1);
// add_action('do_feed_atom_comments', 'p_disable_feed', 1);
function p_disable_feed() {
	 //if ( is_localhost() ) return;

	//wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
	wp_redirect( home_url() );
    exit();
}



// -----------------------------------
// Disabled login in by email
// -----------------------------------
remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );


// ---------------------------------------
// Upload image utf8 
// ----------------------------------------
add_filter( 'sanitize_file_name', 'p_clear_slug', 10, 1 );
function p_clear_slug( $filename ) {
    $sanitized_filename = remove_accents( $filename ); // Convert to ASCII
    // Standard replacements
    $invalid = array(
        ' '   => '-',
        '%20' => '-',
        '_'   => '-',
    );
    $sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
    $sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
    $sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
    $sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
    $sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
    $sanitized_filename = strtolower( $sanitized_filename ); // Lowercase
    return $sanitized_filename;
}

// clear utf8
function p_clear_utf8($str) {

 if(!$str) return false;

 $utf8 = array(
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
'd'=>'đ|Đ',
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
);

foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

return $str;

}

// ------------------------
// zip html
// ----------------------------
// p_Mify_Html(ob_get_clean());
function p_Minify_Html($Html)
{
   $Search = array(
    '/(\n|^)(\x20+|\t)/',
    '/(\n|^)\/\/(.*?)(\n|$)/',
    '/\n/',
    '/\<\!--.*?-->/',
    '/(\x20+|\t)/', # Delete multispace (Without \n)
    '/\>\s+\</', # strip whitespaces between tags
    '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
    '/=\s+(\"|\')/'); # strip whitespaces between = "'

   $Replace = array(
    "\n",
    "\n",
    " ",
    "",
    " ",
    "><",
    "$1>",
    "=$1");

$Html = preg_replace($Search,$Replace,$Html);
return $Html;
}




// -----------------------------------
// clear phone
// -----------------------------------
function p_clear_phone($phone){
    if( empty($phone) ) return;
    return preg_replace("/[^0-9]/", '', $phone);
}




// ---------------------------------------
// Support file svg
// ----------------------------------------
add_filter('upload_mimes', 'p_support_svg');
function p_support_svg($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}



// -----------------------------------
// Change text footer admin
// -----------------------------------
add_filter('admin_footer_text', 'p_change_text_footer_admin');
function p_change_text_footer_admin () {
 	//_e("&copy;Copy Right to <b>Ptheme</b> | Thiết kế website bởi <a href='#'>Ptheme</a>",TDM);
	_e("&copy;Copy Right to <b>Redi</b> | Thiết kế website",TDM);
}

// -------------------------------
// Hidden version wp
// -------------------------------
// add_action("admin_head","p_func_hide_ver");
// function p_func_hide_ver(){	
// 	echo
// 		"<style>
// 		#footer-upgrade{
// 			display: none !important;
// 		}
// 	</style>";
// }


// -------------------------------
// Code check version (ex: global $wp_version > 4.9)
// -------------------------------
// if ( version_compare( $GLOBALS['wp_version'], '4.9', '>=' ) ) {
// 	// lớn hơn hoặc bằng
// 	// code 
// } else {
// 	// thấp hơn 
// 	//
// }



// ---------------------------------------
// excerpt_length
// ----------------------------------------
if ( ! function_exists( 'p_custom_excerpt_length' ) ) {

	add_filter( 'excerpt_length', 'p_custom_excerpt_length', 999 );

	function p_custom_excerpt_length( $length ) {
	 	return is_home() ? 100 : 55;
	}

}



// ---------------------------------------
// Show html pre and print_r
// ----------------------------------------
function print_r2($array){
	echo "<pre>";
	echo print_r($array);
	echo "</pre>";
}

function print_r22($array){
	if( !is_localhost() ) return;

	echo "<pre>";
	echo print_r($array);
	echo "</pre>";
}


if ( !function_exists('p2') ){
	function p2($array){
		print_r2();
	}
}


// -----------------------------------
// check is localhost : 
// Ex: add code google analytics, add link social newtwork , add link tawk.to
// -----------------------------------
function is_localhost(){
    return in_array( $_SERVER["SERVER_ADDR"] ,  ['127.0.0.1' , "::1"] ) ;
}

function is_lh(){
    return is_localhost();
}

function p_current_page() {
	global $wp;
	return home_url( $wp->request );
}


function p_slug_current_page() {
	global $wp;
	return $wp->request;
}


function p_admin_ajax() {
	return admin_url("admin-ajax.php");
}

// ----------------------------------
// Hidden body
// ----------------------------------
function p_hidden_body(){
	echo "<style>body{display:none;}</style>";
}


// ------------------------------------------
// Remove Query String from Static Resources 
// ------------------------------------------
// if ( ! function_exists( 'p_remove_cssjs_ver' ) ) {
// 	function p_remove_cssjs_ver( $src ) {
// 	 if( strpos( $src, '?ver=' ) )
// 	 $src = remove_query_arg( 'ver', $src );
// 	 return $src;
// 	}
// 	add_filter( 'style_loader_src', 'p_remove_cssjs_ver', 10, 2 );
// 	add_filter( 'script_loader_src', 'p_remove_cssjs_ver', 10, 2 );
// }


// -------------------------------
// Body add class
// -------------------------------
add_action('body_class', 'p_add_class_body');
function p_add_class_body($classes){

  $classes[] = is_multi_author() ? "body_is_multi_author" : "body_is_one_author";
  $classes[] = is_localhost() ? "body_is_localhost" : "body_is_not_localhost";
  $classes[] = wp_is_mobile() ? "body_wp_is_mobile" : "body_wp_is_not_mobile";

  return $classes;
}


// -----------------------------------------------
//	Link img/ size = thumbnail, medium, large, ''
// -----------------------------------------------
function p_link_img($size = '', $echo = false, $id = false ){ 
  $r = !empty(  wp_get_attachment_image_src( get_post_thumbnail_id( $id ? $id : false ),$size)[0] ) ?
	   wp_get_attachment_image_src( get_post_thumbnail_id(  $id ? $id : false ),$size)[0] : 
	   p_link_img_placeholder();

 if ( $echo ) { echo $r; } else { return $r;  }

}

// -----------------------------------------------
// Link img placeholder default
// -----------------------------------------------

function p_link_img_placeholder($echo = false ){
  	$r = apply_filters( 'p_apply_link_img_placeholder', P_IMG.'/placeholder.png'); 

  	if ( $echo ) { echo $r; } else { return $r;  }
}

function p_img_null($echo = false ){
  	$r = apply_filters( 'p_apply_img_null', P_IMG.'/placeholder.png'); 
  	if ( $echo ) { echo $r; } else { return $r;  }
}



// ----------------------------------
// Change Readmore
// ----------------------------------
if ( ! function_exists( 'p_new_excerpt_more' ) ) {
	add_filter('excerpt_more', 'p_new_excerpt_more');
	function p_new_excerpt_more() {
		//return '... <a class="" href="'. get_permalink($post->ID) . '"> ... </a>';
	    return '...';
	}
}



// ------------------------------------------
// Post Type: add view frontend
// -----------------------------------------
if ( ! function_exists( 'p_view_post' ) ) {
	function p_view_post( $echo = false ){
		// check ??
		if( !is_single()) return;
			
		global $post;
		$meta_key = 'p_view_post';
		$view_post = get_post_meta( $post->ID , $meta_key , true );

			if(!$view_post){
				add_post_meta( $post->ID , $meta_key , 1);
				$view_post = 1;
			} else {
				$view_post = $view_post+1;
				update_post_meta( $post->ID , $meta_key , $view_post);
			}
		 if ( $echo ) { echo $view_post; } else { return $view_post;  }
	}
}

// Post Type: Add view to band list edit.php
add_filter('manage_post_posts_columns', 'p_view_post_table'); // hook create band 
add_action( 'manage_post_posts_custom_column' , 'p_view_post_column', 10, 3 ); // hook create data column

function p_view_post_table( $defaults ) {
    $defaults['view']  = __('Views',TDM);
    return $defaults;
}
function p_view_post_column( $column, $post_id ) {
    switch ( $column ) {
        case 'view':
       	   $meta_key = 'p_view_post';
           $view_post = get_post_meta( $post_id ,  $meta_key  , true );
           $view_post_show = !empty($view_post) ? $view_post : 0;
           echo $view_post_show;
        break; 
    }
}


// ---------------------------------
// Role
// administrator
// subscriber
// if ( p_get_current_user_role() == "subscriber" ) show_admin_bar( false );
//----------------------------------
function p_get_current_user_role() {
  if( is_user_logged_in() ) {
    $user = wp_get_current_user();
    $role = ( array ) $user->roles;
    return $role[0];
  } else {
    return false;
  }
}

// show title - h1

function p_show_title_archive(){
	if( is_category()) {

		single_cat_title( __( '', TDM ) ); 

	} else if( is_search() ) {

		printf( __( t_pll('Kết quả tìm kiếm từ khóa: "%s"', 'Keyword search results: "%s"'  ) ), get_search_query() );
	
	} else if ( is_tag()){

		single_cat_title( __( 'Tag: ', TDM ) ); 

	} else if ( is_author()){

		echo t_pll("Tác giả: ", "Author: " );
		the_author();
	
	} else if ( is_tax() ){

	 	$r = explode( ':', get_the_archive_title()  );
	 	echo trim($r[1]);

	} else if( is_archive() ){

		the_archive_title();

	} else{
		the_archive_title();
	}

}


function p_show_title_archive2(){
	ob_start();

	p_show_title_archive();

	return ob_get_clean();

}



function p_show_des_archive(){
	if( is_category()) {

		echo category_description();

	} else if ( is_tag()){

		echo tag_description();
	
	} else if ( is_author()){

		the_author_description();
	
	} else if( is_archive() ){
	
		the_archive_description();
	
	}  else{

		the_archive_description();
	}
}



function p_show_des_archive2(){
	ob_start();

	p_show_des_archive();

	return ob_get_clean();

}





// limit word
function p_limit_words($string, $word_limit,$echo = false ) {

	$words = explode(' ', $string, ($word_limit + 1));

	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	if ( $echo ) { echo implode(' ', $words); } else { return implode(' ', $words);  }
}




// ----------------------------------
// remove field url
// ---------------------------------
add_filter('comment_form_default_fields','p_disable_comment_url');
function p_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}



// ----------------------------------
// set post thumbnail default if post content have img frist
// ---------------------------------
add_action('save_post','p_first_img_to_thumb_post');
function p_first_img_to_thumb_post($post_id) {
	if (!defined('DOING_AUTOSAVE')||!DOING_AUTOSAVE) {
		if (!($id=wp_is_post_revision($post_id)))
		$id=$post_id;
		if (isset($_POST['content'])&&!get_post_thumbnail_id($id)) {
		$match=array();
		preg_match('/"[^"]*wp\-image\-(\d+)/',$_POST['content'],$match);
		if (isset($match[1])) set_post_thumbnail($post_id,intval($match[1]));
		}
	}
}




// ----------------------------------
// #,color -> rgba,
// Ex: p_hex2rgba(red,0.5);
// ---------------------------------
function p_hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	if(empty($color)) return $default; 
 
        if ($color[0] == '#' ) { $color = substr( $color, 1 ); }
        	
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        $rgb =  array_map('hexdec', $hex);
 
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

    return $output;
}


// ------------------------------------
// Id youtube -> iframe...
// ------------------------------------
function p_id_youtube( $link ){
	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $link , $match)) {
	    return $match[1];
	}
}

// ------------------------------------
// Id video -> iframe...
// ------------------------------------
function p_match_vimeo_id($url){
    //preg_match("/https?:\/\/(?:www\.)?vimeo\.com\/\d{8}/", $link_youtube, $output_array);

 if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
            $id = $regs[3];
        }
    
     return $id;
}



// ------------------------------------
// current days
// Ex: echo p_day_to_ngay( date('D') );
// ------------------------------------
function p_day_to_ngay($day){
	switch ($day) {
		case 'Mon':return "Thứ hai";break;
		case 'Tue':return "Thứ ba";break;
		case 'Wed':return "Thứ tư";break;
		case 'Thu':return "Thứ năm";break;
		case 'Fri':return "Thứ sáu";break;
		case 'Sat':return "Thứ bảy";break;
		case 'Sun':return "Chủ nhật";break;
	}
}


// ------------------------------------
// current days
// Ex: echo p_mon_to_thang( date('m') );
// ------------------------------------
function p_mon_to_thang($month){
	$before = "Tháng ";
	$after = "";
	switch ($month) {
		case "01";case "1": $month_mod="1"; break;
		case "02";case "2": $month_mod="2"; break;
		case "03";case "3": $month_mod="3"; break;
		case "04";case "4": $month_mod="4"; break;
		case "05";case "5": $month_mod="5"; break;
		case "06";case "6": $month_mod="6"; break;
		case "07";case "7": $month_mod="7"; break;
		case "08";case "8": $month_mod="8"; break;
		case "09";case "9": $month_mod="9"; break;
		case "10";case "10": $month_mod="10"; break;
		case "11";case "11": $month_mod="11"; break;
		case "12";case "12": $month_mod="12"; break;

	}
	return $before.$month_mod.$after;
}




Class P_Walker_Nav_Mobile extends Walker_Nav_Menu{

	protected $button = '<i class="fa fa-angle-down fa-click-child-menu-mobile p-cur"></i>';

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
    $indent = str_repeat( $t, $depth );
 
    // Default class.
    $classes = array( 'sub-menu' );
 
    $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
    $output .= "{$n}{$indent}".$this->button."<ul$class_names>{$n}";
	}
}





// ---------------------------------------
// ------------------------------------
// Add Hook
// ---------------------------------
// ---------------------------------------



// -----------------------------------
// Add scroll top
// -----------------------------------
add_action('wp_footer','p_add_scroll_top');
function p_add_scroll_top(){
	include P_DIR . '/scroll-top.php';
}



// -----------------------------------
// padding calc
// -----------------------------------

function p_padding_calc($w,$h){
  // padding-top:calc( 100% / ( 300 / 200 ) );
  return "calc( 100% / ( $w / $h ) )";
}


// -----------------------------------
// background and color
// -----------------------------------
function p_bg_color($w,$h){
	echo "padding-top:30%;background:linear-gradient(to right bottom,rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('bg.jpg') no-repeat center/cover";
}





// -----------------------------------
// Js repeat field
// -----------------------------------
function p_js_repeat_field_demo(){ ?>
	
<div class='' data-ac-repeater data-ac-repeater-text="Add row1" >
	<label>Some label</label>
	<input value='' name="my-input">
</div>

<?php }


// -----------------------------------
// function 
// -----------------------------------

//string
function p_e( $a = "",$b = "" ){
	return ( !empty($a) ) ? $a : $b;
}

// string 3 params
function p_e3( $a = "",$b = "", $c = "" ){
	return ( !empty($a) ) ? $a : ( !empty($b) ? $b : $c );
}

// string 4 params
function p_e4( $a = "",$b = "",  $c = "" , $d = "" ){
	return ( !empty($a) )  ? $a : ( !empty($b) ? $b :  ( !empty($c) ? $c : $d ) );
}

// get
function p_eg( $a = "",$b = "" ){
	return ( !empty( $_GET[$a] ) ) ? $_GET[$a] : $b;
}

// post
function p_ep( $a = "",$b = "" ){
	return ( !empty( $_POST[$a] ) ) ? $_POST[$a] : $b;
}

// echo 
function p_h( $html = "" , $re = 1, $echo = false ){

	$r = str_repeat(  "<br/>" , (int) $re ) .  $html;

	if ( !$echo  ) { return $r; } else { echo $r; }
					
}

 function p_scrapeImage($text) {
    $pattern = '/src=[\'"]?([^\'" >]+)[\'" >]/';
    preg_match($pattern, $text, $link);
    $link = $link[1];
    $link = urldecode($link);
    return $link;

}


// -----------------------------------
// random string
// -----------------------------------
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



// -----------------------------------
// match tel
// -----------------------------------
function wpcf7_is_tel2( $tel ) {
    $result = preg_match( '%^[+]?[0-9()/ -]*$%', $tel );
    return $result;
}


// -----------------------------------
// pagination
// -----------------------------------
function p_pagination(){
	ob_start();

	include get_template_directory() . "/pagination.php";

	return ob_get_clean();
}


// -----------------------------------
// pagination
// -----------------------------------

// echo wp_trim_words( get_the_excerpt() ,  25, '...' ); 
function p_wp_trim_words( $data, $num, $ex ){
	return wp_trim_words( $data, $num, $ex );
}


function p_re_home(){

	header("location:" . home_url()  );
	exit;
}
// start ajaxurl 
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
// end add ajaxurl
// start datetime
function datetimeConverter($date,$format_to){
	$result="";
	$arrDate    = date_parse_from_format('Y-m-d H:i:s', $date) ;
	$ts         = mktime($arrDate["hour"],$arrDate["minute"],$arrDate["second"],$arrDate['month'],$arrDate['day'],$arrDate['year']);
	$result     = date($format_to, $ts);
	return $result;
}
// end datetime
// start paging
function getPaging($queryObj = null){
	if($queryObj != null){

		$big = 999999999;
			//#038;
		$pagenum_link = str_replace( $big, '%#%', get_pagenum_link( $big ));
		$pagenum_link = str_replace( '#038;','&',  $pagenum_link);

		$args = array(
			'base'               => $pagenum_link,
			'format'             => '?paged=%#%',
			'total'              => $queryObj->max_num_pages,
			'current'            => max(1,get_query_var('paged')),
			'show_all'           => false,
			'end_size'           => 1,
			'mid_size'           => 2,
			'prev_next'          => false,
			'type'               => 'list',
		);

		return paginate_links($args);	

	}
}
// end paging
// start ddsmoothmenu
add_action('wp_head', 'add_code_ddsmoothmenu');
function add_code_ddsmoothmenu(){			
	$chuoi= '	
	<script type="text/javascript" language="javascript">	
	ddsmoothmenu.init({
			mainmenuid: "smoothmainmenu", 
			orientation: "h", 
			classname: "ddsmoothmenu",
			contentsource: "markup" 
		});
	ddsmoothmenu.init({
			mainmenuid: "smoothmainmenumobile", 
			orientation: "h", 
			classname: "ddsmoothmenu",
			contentsource: "markup" 
		});
	</script>
	    ';				
	echo $chuoi;
}
// end ddsmoothmenu
/* begin template include */
add_filter( 'template_include', 'portfolio_page_template');
function portfolio_page_template( $template ) {

	$id=get_queried_object_id();
	$slug="";
	$term=get_term_by('id', $id,'category');
	if(!empty($term)){
		$slug=$term->slug;
	}	
	if(strcmp($slug, 'dich-vu') == 0){
		$file = get_template_directory() . '/template-01-service.php';
		if(file_exists($file)){
			return $file;
		}
	}		
	return $template;
}
/* end template include */
/* start add footer */
add_action('wp_footer', 'script_footer');
function script_footer(){
	$facebook="

<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=1994326743991661&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	";
	$google='

<script src="https://apis.google.com/js/platform.js" async defer></script>

	';
	$pan_search="
	<div class='pan_search'>
		<div class='pan_close'>
		 <a href='javascript:void(0);' onclick='closeFrmSearch();'><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>
		</div>
		<form class='frmsearcharticle' name='frm_search_article' method='GET'>
			<div class='vatimkiem'><input value='' name='s' type='search' placeholder='Tìm kiếm' class='txt_search'></div>
			<div class='btnsearch'>
				<a href='javascript:void(0);' onclick='document.forms[\"frm_search_article\"].submit();'><img src='".P_IMG."/search-w.svg"."' /></a>
			</div>
		</form>
	</div>
	";
	echo $pan_search;
	echo $google;
	echo $facebook;
}
/* end add footer */