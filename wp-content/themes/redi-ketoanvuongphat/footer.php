<?php 
/*

Footer template

*/
?>
<div class="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="footer_logo">
						<a href="<?php echo home_url() ?>" title="Logo">					
							<img src="<?php echo get_field('logo_header','option'); ?>" alt="Logo" >
						</a>
					</div>
					<div class="blog-info-social">
						<div class="bloginfo_name"><?php echo get_bloginfo( 'name'); ?></div>
						<div class="blog-social">
							<?php 
							$source_social=get_field('op_inf_sn_repeat','option');				
							if(count(@$source_social) > 0){
								?>
								<ul class="social_lst">
									<li>
										<a href="<?php echo @$source_social[0]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-facebook-official" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="<?php echo @$source_social[3]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow">
											<i class="fa fa-google-plus-official" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="<?php echo @$source_social[2]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
										</a>
									</li>					
									<li>
										<a href="<?php echo @$source_social[5]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-instagram" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
								<?php
							}
							?>
							<div class="clr"></div>	
						</div>
					</div>
					<div class="clr"></div>	
				</div>				
				<div class="col-md-6">
					<div class="footer-address-phone-email-box">
						<div class="footer-addr">
							<span class="footer-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							<span class="tr_address"><?php echo get_field( 'dia_chi', 'option' ); ?></span>
						</div>
						<div class="footer-phone-email-box">
							<div class="footer-phone-box">
								<span class="footer-icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
								<span class="tr_phone">
									<a href="tel:<?php echo get_field('tel_alo','option'); ?>"><?php echo get_field( 'sdt', 'option' )?></a>
								</span>
							</div>
							<div class="footer-email-box">
								<span class="footer-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
								<span class="tr_email">
									<a href="mailto:<?php echo get_field('email_info','option'); ?>"><?php echo get_field( 'email_info', 'option' )?></a>
								</span>
							</div>
							<div class="clr"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="footer_copyright">
		<span class="copyright">&copy; 2018</span> <span class="golden_home"><a href="<?php home_url( '', null ); ?>" title="tiêu đề tên">Ke Toan Vuong Phat</a></span> <span class="copyright">.</span> <span class="copyright">Designed by</span> <span  class="redi_link"><a href="https://redi.vn" title="REDI - Thiết kế website chuẩn Marketing &amp; giải pháp Digital Marketing" target="_blank" rel="nofollow">REDI</a></span>
	</div>	
</div>
<div class="modal fade" id="baogiamodal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">			
			<div class="modal-body">
				<div class="cbblose">
					<a href="javascript:void(0);" data-dismiss="modal">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>							
				</div>					
				<form class="info_modal" name="frm_dk_bg">
					<h4 class="info_title">Đăng ký tư vấn thuế miễn phí</h4>
					<div class="ck_contact"><input type="text" name="fullname" class="form-control" placeholder="Họ tên" required></div>
					<div class="ck_contact"><input type="text" name="phone" class="form-control" placeholder="Điện thoại" required></div>
					<div class="ck_contact"><input type="text" name="email" class="form-control" placeholder="Email" required></div>
					<div class="ck_contact">
						<textarea name="message" class="form-control" cols="30" rows="10" placeholder="Ghi chú thêm" required=""></textarea>
					</div>
					<div class="ck_submit">
						<a href="javascript:void(0);" onclick="registerNow(this);">Đăng ký</a>
						<div class="ajax_loader_contact"></div>
                		<div class="clr"></div>     
					</div>
					<div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>
				</form>	
				<div class="clr"></div>			
			</div>			
		</div>
	</div>
</div>
<?php
wp_footer();
?>
</body>
</html>
