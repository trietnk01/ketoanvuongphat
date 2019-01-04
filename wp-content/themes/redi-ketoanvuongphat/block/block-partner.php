<?php 
$source_partner=get_field('hp_partner_rpt','option');
if(count(@$source_partner) > 0){
	?>
	<div class="box_partner">
		<div class="container">
			<div class="row">
				<div class="col-lg">
					<div class="owl_carousel_trade owl-carousel owl-theme owl-loaded">		
						<?php 
						foreach ($source_partner as $key => $value) {
							?>
							<div class="item">
							<a href="<?php echo @$value['hp_partner_link'] ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><img src="<?php echo @$value['hp_partner_logo'] ?>" alt="tên hình"></a>
						</div>
							<?php
						}
						?>														
					</div>							
				</div>
			</div>
		</div>		
	</div>
	<?php
}
?>
