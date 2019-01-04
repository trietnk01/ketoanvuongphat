<?php 
/*

Single Loop author

*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<!-- author post -->

<div class="entry-author">
	<!-- <div class="entry-author-title">Tác giả</div> -->
	
	<div class="p767-t-c">
	
		<div class="entry-author-avatar p-d-ib p-v-t p767-d-b">
		<?php echo get_avatar('', $size = 80) ?>
		</div>

		<div class="p-d-ib p-pl-10 p-pt-0 p-pt-10 p767-pt-0 p767-d-b">
			<div class="entry-author-name p-pt-0">
			<?php the_author_posts_link() ?> 
			- <span><?php printf( _nx( t_pll('1 Bài viết', "One post") ,  t_pll('%1$s Bài viết',"%1$s posts") ,get_the_author_posts(), 'author posts',TDM ),get_the_author_posts()); ?></span>
				
			</div>
	
			<div class="entry-author-des">
				<?php the_author_description() ?>
			</div>

		</div>

	</div>

</div>

