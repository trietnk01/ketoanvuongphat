<?php
/**
 * The sidebar containing the main widget area.
 *
 * 
 */

// if ( ! is_active_sidebar( 'sidebar-footer-1' ) &&
// 	 ! is_active_sidebar( 'sidebar-footer-2' ) &&
// 	 ! is_active_sidebar( 'sidebar-footer-3' ) &&
// 	 ! is_active_sidebar( 'sidebar-footer-4' )) {
// 	return;
// }

$tong_wg = 4;
$sl_wg = 0;

// Tìm số lượng wigget area để chia ra col
for( $i = 1; $i<= $tong_wg; $i++ ){
	if ( is_active_sidebar( "sidebar-footer-$i" ) ) {
		$sl_wg++;
	}
}

if( $sl_wg == 0 ) return;

?>


<div class="clearfix"></div>

<div class="section-footer p-ptb-30 p767-ptb-20">
	<div class="container">

		<div class="row" id="sidebar-2" role="complementary">	

			<?php for( $i=1; $i<= $tong_wg; $i++) {
					
				 if (  $sl_wg == $tong_wg ){

				 	// tính margin cho widget area
				 	if ( $i <= 2 ) {   
				 		$chia_col = "col-xs-12 col-sm-6 col-md-3 p991-mb-20";
				 	} else if( $i == 3 ) {
				 		$chia_col = "col-xs-12 col-sm-6 col-md-3 p767-mb-20";
				 	} else {
				 		$chia_col = "col-xs-12 col-sm-6 col-md-3 p767-la-mb-0";
				 	}


				 } else {
				 	$chia_col = "col-xs-12 col-sm-".(12/$sl_wg)." p767-mb-20 p767-la-mb-0";
				 }

			 ?> 
			 	<?php if( is_active_sidebar( "sidebar-footer-$i" )) { ?>

					<div class="<?php echo $chia_col ?>">
						<?php dynamic_sidebar( "sidebar-footer-$i" ); ?>
					</div>


				<?php }  ?>

				<?php  if (  $sl_wg == $tong_wg && $i == 2 ){ ?>
					<div class="clearfix visible-xs visible-sm"></div>
				<?php } ?>


			<?php }  ?>

		</div>

	</div><div class="clearfix"></div>
</div>