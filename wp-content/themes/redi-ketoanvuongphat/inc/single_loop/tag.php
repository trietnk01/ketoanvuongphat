<?php 
/*

Single Loop tag

*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !has_tag()) return; 

?>

<div class="entry-tag p-mtb-5">
    <i class="fa fa-tags"></i> 
    <?php echo t_pll('Từ khóa tag: ', 'Keyword tag: ' ) ?> 
    <?php the_tags('', ' '); ?>
</div><div class="clearfix"></div>


