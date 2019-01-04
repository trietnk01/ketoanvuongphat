<?php 
/*

Single Loop time

*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>
<div class="entry-on">
	<span>
	<i class="fa fa-clock-o" aria-hidden="true"></i>
	<?php 
		if(get_the_modified_date('H:i - d/m/Y') == get_the_date('H:i - d/m/Y') ) {
		 	echo get_the_date('H:i - d/m/Y');
		}	else{  
		  	printf( t_pll('Cập nhật lúc: %1$s',"Update : %1$s") , "<span>" .  get_the_modified_date('H:i - d/m/Y') . "</span>" );
		} 
	?>
	</span>
	
	<?php if( has_category()) { ?> 
	<span>
		<?php echo t_pll(' - Thể loại: '," - Category: ") ?>
		<?php the_category(', '); ?> 
	</span>
	<?php } ?>

	<span>
		<?php echo t_pll(' - Tác giả: ', ' - Author:  ') ?>
		<?php the_author_posts_link(); ?> 
	</span>
	
	<?php if( is_single()) { ?> 
	<span>
		<?php echo t_pll(' - Lượt xem: ', " - View: ") ?>
		<span>
			<?php echo p_view_post() ?>
		</span> 
	</span>
	<?php } ?>

	<span>
	   <?php edit_post_link( t_pll(' Chỉnh sửa', 'Edit'),'- ',''); ?>
	</span>
</div>

