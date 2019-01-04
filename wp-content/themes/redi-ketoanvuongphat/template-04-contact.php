<?php
/*
Template name: Template liên hệ
Template Post Type: post, page
*/
get_header();
?>
<div class="box_contact">
	<div class="container">		
		<div class="row">
			<div class="col"><h1 class="contact_title">Gửi tin nhắn cho chúng tôi</h1>				</div>
		</div>		
		<div class="row">
			<div class="col-sm-6">				
				<form name="frm_contact" action=""> 
					<div class="ck_contact"><input type="text" name="fullname" class="form-control" placeholder="Họ tên" required></div>
					<div class="ck_contact"><input type="text" name="phone" class="form-control" placeholder="Điện thoại" required></div>
					<div class="ck_contact"><input type="text" name="email" class="form-control" placeholder="Email" required></div>	
					<div class="ck_contact"><input type="text" name="title" class="form-control" placeholder="Tiêu đề" required></div>				
					<div class="ck_contact">
						<textarea name="message" class="form-control" cols="30" rows="10" placeholder="Nhập nội dung" required=""></textarea>
					</div>
					<div class="ck_submit">
						<a href="javascript:void(0);" onclick="contactNow();">Gửi</a>
						<div class="ajax_loader_contact"></div>
                		<div class="clr"></div>     
					</div>
					<div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>     
				</form>
			</div>
			<div class="col-sm-6">
				<div class="ctinfo">
					<div class="ctinfo_left">
						<div class="contact-box-home"><i class="fa fa-home" aria-hidden="true"></i></div>
					</div>
					<div class="ctinfo_right">
						<div class="ctinfo_right_text">Địa chỉ liên hệ</div>
						<div  class="ctinfo_right_op"><?php echo get_field('dia_chi','option'); ?></div>
					</div>
					<div class="clr"></div>
				</div>
				<div class="ctinfo">
					<div class="ctinfo_left">
						<div class="contact-box-home"><i class="fa fa-phone" aria-hidden="true"></i></div>
					</div>
					<div class="ctinfo_right">
						<div class="ctinfo_right_text">Hotline tư vấn</div>
						<div  class="ctinfo_right_op_a"><a href="tel:<?php echo get_field('tel_alo','option'); ?>"><?php echo get_field('sdt','option'); ?></a></div>
					</div>
					<div class="clr"></div>
				</div>
				<div class="ctinfo">
					<div class="ctinfo_left">
						<div class="contact-box-home"><i class="fa fa-envelope" aria-hidden="true"></i></div>
					</div>
					<div class="ctinfo_right">
						<div class="ctinfo_right_text">Email</div>
						<div  class="ctinfo_right_op_a"><a href="mailto:<?php echo get_field('email_info','option'); ?>"><?php echo get_field('email_info','option'); ?></a></div>
					</div>
					<div class="clr"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="box_google_map">
					<?php echo get_field('google_map','option'); ?>
				</div>				
			</div>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>