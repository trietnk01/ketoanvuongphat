<?php
/*
	Loop content archive
*/
?>

<div id="post-<?php the_ID(); ?>">
	
	<div class="row">

		<div class="col-xs-12 col-sm-4 p767-mb-15">
			<div class="">
			

				<a href="<?php the_permalink() ?>">
					<div style="background: url(<?php echo p_link_img(); ?>) no-repeat center/cover;padding-top:calc( 100% / ( 320 / 200 ) )">
					</div>
				</a>

			</div>
		</div>
	
		<div class="col-xs-12 col-sm-8">

			<div class="">
				<a href="<?php the_permalink() ?>" class="p-fs-25 p767-fs-20">
					<?php echo get_the_title() ?>
				</a>
			</div>

			<div class="p-fs-13 p-ptb-10">
				<span>
					<i class="fa fa-clock-o" aria-hidden="true"></i> 
					<?php echo get_the_date('H:i - d/m/Y');  ?>
				</span>

				<?php if ( is_category() ) { ?>

					<span>
						<?php echo t_pll(' - Thể loại: '," - Category: ") ?>
						<?php the_category(', '); ?> 
					</span>

				 <?php } ?>


				<span>
				   <?php edit_post_link( __('Edit post',TDM),'- ',''); ?>
				</span>
			</div>


			<div class="">
				<?php echo wp_trim_words( get_the_excerpt() ,  25, '...' );  ?>
			</div>

		</div>
	
	</div>
</div>


