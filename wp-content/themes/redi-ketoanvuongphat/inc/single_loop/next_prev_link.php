<?php 
/*

Single Loop next/prev link

*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="entry-next-link row">

	 <?php if( get_previous_post() ){ ?>
	<div class="col-xs-12 col-sm-6 p767-t-c prev-post p767-mb-10">
		<div class="meta-nav" aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i>
			 <?php echo t_pll('Bài trước',"Previous post") ?></div>
		<?php previous_post_link( '%link', _x( ' %title', 'Bài trước', TDM ) ); ?>
	</div>
	<?php } else { ?>
	<div class="col-xs-12 col-sm-6"></div>
	<?php } ?>


	<?php if( get_next_post() ){ ?>
	<div class="col-xs-12 col-sm-6 p767-t-c next-post p-t-r">
		<div class="meta-nav" aria-hidden="true"><?php echo t_pll('Bài sau',"Next post") ?>
			 <i class="fa fa-angle-right" aria-hidden="true"></i></div>
		<?php next_post_link( '%link', _x( '%title ', 'Bài sau', TDM ) ); ?>
	</div>
	<?php } ?>
	
</div><div class="clearfix"></div>

