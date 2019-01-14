<?php 
$source_service=get_field('op_sidebar_service_rpt','option');
if(count(@$source_service) > 0){
	?>
	<h3 class="dvvp">Dịch vụ của Vương Phát</h3>
	<div class="service-box">
		<?php 
		foreach ($source_service as $key => $value) {
			$service_id=$value['op_sidebar_service_post_id'];
			$args = array(
				'p' => @$service_id,  		
			);
			$the_query=new WP_Query($args);
			if($the_query->have_posts()){
				while($the_query->have_posts()) { 
					$the_query->the_post();
					$post_id=$the_query->post->ID;                                                                      
					$permalink=get_the_permalink($post_id);         
					$title=get_the_title($post_id);
					$excerpt=wp_trim_words( get_the_excerpt($post_id), 20, '...' ) ;
					$price=get_field('op_news_service_price',$post_id);
					$unit=get_field('op_news_service_unit',$post_id);
					$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
					$date_post='';
					$date_post=get_the_date('d/m/Y',@$post_id);      
					?>
					<div class="service-item">									
						<div class="service-left-item">
							<a href="<?php echo @$permalink; ?>">
								<figure>
									<div style="background-image: url(<?php echo @$featured_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (92 / 92))"></div>
								</figure>						
							</a>
						</div>										
						<div class="service-right-item">
							<h3 class="service-right-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title, 5,'') ; ?></a></h3>
							<?php 
							if(!empty($price)){
								?>
								<div class="service-price"><?php echo  p_wc_price_format_html2($price); ?>/<?php echo @$unit; ?></div>
								<?php
							}
							?>	
							<div class="th-dk">
								<div class="timhieu">
									<a href="<?php echo @$permalink; ?>">Tìm hiểu</a>
								</div>
								<div class="dangky">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#baogiamodal">Đăng ký</a>
								</div>
								<div class="clr"></div>
							</div>
						</div>
						<div class="clr"></div>
					</div>
					<?php
				}
				wp_reset_postdata();
			}
		}
		?>
		<div class="clr"></div>
		<div class="service-viewall">
			<a href="<?php echo site_url( 'dich-vu',null ); ?>">Xem tất cả</a>
		</div>			
	</div>
	<?php
}
?>					