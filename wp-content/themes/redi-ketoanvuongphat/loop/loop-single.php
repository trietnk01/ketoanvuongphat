<?php
/*
	Loop content
*/
?>
<div id="post-<?php the_ID(); ?>" class="show-post-single">
	
	<?php 
		if ( apply_filters( "p_display_title_post", true )) {
			echo apply_filters( "p_the_title_post",  
				'<h1 class="entry-title p-mb-10">' .  get_the_title() . "</h1>", get_the_title() 
			);	
		}
	?>
	

	<?php if( is_single()  ) { ?>
		<div>
			<?php
			/*
				@hooked p_single_loop_time - 10
			
			*/
				do_action('p_before_single_content_loop'); 
			?>
		</div>
	 <?php } ?>
	 
	<div class="clearfix"></div>

	<div class="entry-content p-mtb-20">
		<div class="clearfix"></div>
		 	<?php the_content() ?>
		<div class="clearfix"></div>
	</div>

	<div class="clearfix"></div>

	<?php if(  is_single()  ) { ?>
		<div>
			<?php 
			/*
				@hooked p_single_loop_tag - 10
				@hooked p_single_loop_related - 20
				@hooked p_single_loop_author - 30
				@hooked p_single_loop_next_prev_link - 40
				
			*/
				do_action('p_after_single_content_loop'); 
			?>
		</div>
	 <?php } ?>

	<div class="clearfix"></div>
	
</div><div class="clearfix"></div>

