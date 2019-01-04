<?php 
/*
    Add shortcode
*/

/*
	Demo shortcode
	echo do_shortcode( "[p_shortcode_demo]");	
*/
add_shortcode('p_sc_demo','p_func_sc_demo');
function p_func_sc_demo($atts){
	ob_start();
	
	echo "Hello World !";

	return ob_get_clean();
}	

/*
	Top 10 từ khóa seo thịnh hạnh [month]/[year]
*/


//* Shortcode: [year]
add_shortcode( 'year' , 'func_get_year' );
    function func_get_year() {
    $year = date("Y");
    return "$year";
}
 
//* Shortcode: [month]
add_shortcode( 'month' , 'func_get_month' );
    function func_get_month() {
    $month = date("n");
    return "$month";
}




/*
	Class - awesome 
	echo do_shortcode( "[p_sc_class class='fa fa-user' div='i' ]");	
	echo do_shortcode( "[p_sc_class class="p-cl-r" con='Hello World' ]");
*/
add_shortcode("p_sc_class","p_func_sc_class");
function p_func_sc_class( $atts ){
		ob_start();

		extract( shortcode_atts( array(
	    'class' => '',
	    'div' => 'div',
	    'con' => ''
		), $atts ) );

	?>
	
	<<?php echo $div ?> class="<?php echo $class ?>" >
		<?php echo $con ?>
	</<?php echo $div ?>

	<?php
	return ob_get_clean();
}   

/*
	echo do_shortcode( "[p_sc_content]Hello[/p_sc_content]");
*/
add_shortcode("p_sc_content","p_func_sc_content");
function p_func_sc_content( $atts, $content = null ){
	return '<div class="">' . $content . '</div>';
}   



