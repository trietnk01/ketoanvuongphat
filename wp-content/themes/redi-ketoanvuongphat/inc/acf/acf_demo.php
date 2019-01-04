<?php 
	echo p_acf('show_text_demo','asdasd');
?>


<?php 

if( have_rows('show_repeat','option') && function_exists('have_rows') ): $i=1;
	$count_show_repeat = count( get_field('show_repeat', 'option') );

    while ( have_rows('show_repeat','option') ) : the_row();
		
		$show_repeat_title =  p_acf_s('show_repeat_title','faild');
		$show_repeat_img =  p_acf_s('show_repeat_img', p_img_null() ,'','url');
	
	?>
		<div class="">
			<div class="">
				<?php echo $show_repeat_title ?>
			</div>

			<div>
				<img src="<?php echo $show_repeat_img ?>" alt="img" style="width:50px;height:50px">
			</div>

		</div>

	<?php 	
       
	$i++; endwhile;
	
endif;

?>


