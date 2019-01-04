<div class="wrap-hotline">
	<div class="hotline-typeicon">	
	
		<div class="hotline-outner">
			<div class="hotline-spicon">
				<i class="fa fa-phone"></i>
			</div>
			<span class="hotline-title p-up">
				Hotline
			</span>
			<?php 
			$tel_alo=get_field('tel_alo','option');
			$sdt=get_field('sdt','option');
			?>
			<a href="tel:<?php echo $tel_alo; ?>" class="hotline-number">
				<?php echo $sdt;?>
			</a>
		</div>

	</div>
</div>