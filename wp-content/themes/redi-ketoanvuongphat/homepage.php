<?php
/*
	 Template Name: HomePage
	 */
	get_header();
	$source_banner=get_field('op_banner_repeat','option');		
	?>
	<div class="owl_carousel_banner owl-carousel owl-theme owl-loaded">		
		<?php 
		foreach ($source_banner as $key => $value) {
			?>
			<div class="item"><img src="<?php echo @$value["op_banner_repeat_img"]; ?>"></div>
			<?php
		}
		?>								
	</div>
	<div class="hr_slideshow"></div>
	<div class="bg_ck_mp_tc">		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="ck_wrapper">
						<div class="ck_mp_tc_left"><img src="<?php echo P_IMG.'/icon_camket.png'; ?>"></div>
						<div class="ck_mp_tc_right">CAM KẾT 100% GỖ THẬT</div>
						<div class="clr"></div>
					</div>
				</div>
				<div class="col">
					<div class="mp_wrapper">
						<div class="ck_mp_tc_left"><img src="<?php echo P_IMG.'/icon_mienphinoithat.png'; ?>"></div>
						<div class="ck_mp_tc_right">MIỄN PHÍ THIẾT KẾ TỦ BẾP</div>
						<div class="clr"></div>
					</div>
				</div>
				<div class="col">
					<div class="tc_wrapper">
						<div class="ck_mp_tc_left"><img src="<?php echo P_IMG.'/icon_thicong.png'; ?>"></div>
						<div class="ck_mp_tc_right">THI CÔNG ĐÚNG TIẾN ĐỘ</div>
						<div class="clr"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg_bottom">
		<h3 class="tsnhtv_goldenhomes">TẠI SAO NÊN HỢP TÁC VỚI GOLDEN HOMES?</h3>		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="why_box">
						<div class="why_box_solieu">500+</div>
						<div class="why_box_hr"></div>
						<div class="why_box_txt">Khách hàng tiêu biều</div>
					</div>
				</div>
				<div class="col">
					<div class="why_box">
						<div class="why_box_solieu">30+</div>
						<div class="why_box_hr"></div>
						<div class="why_box_txt">Thợ tay nghề cao</div>
					</div>
				</div>
				<div class="col">
					<div class="why_box">
						<div class="why_box_solieu">9+</div>
						<div class="why_box_hr"></div>
						<div class="why_box_txt">Năm kinh nghiệm</div>
					</div>
				</div>
				<div class="col">
					<div class="why_box">
						<div class="why_box_solieu">99%</div>
						<div class="why_box_hr"></div>
						<div class="why_box_txt">Khách hàng hài lòng</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clr"></div>
	<div class="bg_bottom_v2">
		<h3 class="dvcchungtoi">Dịch vụ của chúng tôi</h3>
		<div class="paracell">
			<div class="k2-left"><img src="<?php echo P_IMG.'/k2-left.png'; ?>"></div>
			<div class="tieude"><img src="<?php echo P_IMG.'/icon_tieude.png'; ?>"></div>
			<div class="k2-right"><img src="<?php echo P_IMG.'/k2-right.png'; ?>"></div>
		</div>
	</div>
	<?php
	get_footer();
?>