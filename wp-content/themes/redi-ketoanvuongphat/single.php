<?php
get_header();
$post_id=0;
$title="";
$excerpt="";
$content="";
$featured_img="";
$source_term_id=array();
$permalink="";
$date_post="";
$term_slug="";
if(have_posts()){
	while (have_posts()) {
		the_post();                            
		$post_id=get_the_ID(); 
		$title=get_the_title($post_id);    
		$excerpt=get_the_excerpt( $post_id );
		$content=get_the_content( $post_id);
		$permalink=get_the_permalink( $post_id );
		$date_post=get_the_date('d/m/Y',@$post_id);    
		$source_term = wp_get_object_terms( $post_id,  'category' );          
		$term_slug=$source_term[0]->slug;
		$featured_img=get_the_post_thumbnail_url($post_id, 'full');                   
		if(count($source_term) > 0){
			foreach ($source_term as $key => $value) {
				$source_term_id[]=$value->term_id;
			}
		}    
	}
	wp_reset_postdata();  
}
?>
<div class="box-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h1 class="diem_kd_h"><?php echo @$title; ?></h1>
				<div class="news_published_date">
					<span><img src="<?php echo P_IMG.'/calendar.png'; ?>"></span>
					<span class="published_date_txt"><?php echo @$date_post; ?></span>
				</div>
				<div>
					<?php 
					if(have_posts()){
						while (have_posts()) {
							the_post();                            
							the_content();
						}
						wp_reset_postdata();  
					}
					?>
				</div>
				<div class="vcomment">
					Bình luận
				</div>
				<div>
					<div class="fb-comments" data-href="<?php echo @$permalink; ?>" data-width="500" data-numposts="5"></div>					
				</div>
			</div>
			<div class="col-lg-4">
				<?php 
				$args = array(
					'post_type' => 'post',  
					'orderby' => 'id',
					'order'   => 'DESC',  
					'posts_per_page' => 6,        
					'post__not_in'=>array($post_id),
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field'    => 'slug',
							'terms'    => array($term_slug),                   
						),
					),
				);
				$the_query=new WP_Query($args);
				if($the_query->have_posts()){
					if(strcmp($term_slug, 'dich-vu')==0){
						?>
						<h3 class="dvvp">Các dịch vụ khác</h3>
						<?php
					}else{
						?>
						<h3 class="dvvp">Tin tức liên quan</h3>
						<?php
					}
					?>					
					<div class="service-box">
						<?php 
						while($the_query->have_posts()) { 
							$the_query->the_post();
							$post_id=$the_query->post->ID;                                                                      
							$permalink=get_the_permalink($post_id);         
							$title=get_the_title($post_id);
							$excerpt=wp_trim_words( get_the_excerpt($post_id), 20, '...' ) ;
							$price=get_field('op_news_service_price',$post_id);
							$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
							$date_post='';
							$date_post=get_the_date('d/m/Y',@$post_id);      
							?>
							<div class="service-item">
								<div class="service-left-item">
									<a href="<?php echo @$permalink; ?>">
										<figure>
											<div style="background-image: url(<?php echo @$featured_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (600 / 400))"></div>
										</figure>						
									</a>
								</div>
								<div class="service-right-item">
									<h3 class="service-right-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title, 4,'') ; ?></a></h3>
									<?php 
									if(strcmp($term_slug, 'dich-vu')==0){
										?>
										<div class="service-price"><?php echo  p_wc_price_format_html2($price); ?>/tháng</div>
										<?php
									}
									if(strcmp($term_slug, 'dich-vu')==0){
										?>
										<div class="th-dk">
											<div class="timhieu">
												<a href="<?php echo @$permalink; ?>">Tìm hiểu</a>
											</div>
											<div class="dangky">
												<a href="javascript:void(0);">Đăng ký</a>
											</div>
											<div class="clr"></div>
										</div>
										<?php
									}else{
										?>
										<div class="th-dk">
											<div class="timhieu">
												<a href="<?php echo @$permalink; ?>">Tìm hiểu</a>
											</div>											
											<div class="clr"></div>
										</div>
										<?php
									}
									?>																		
								</div>
								<div class="clr"></div>
							</div>
							<?php
						}
						?>
						<div class="clr"></div>								
					</div>
					<?php
					wp_reset_postdata();
				}
				?>					
				<div class="ritan">
					<?php include get_template_directory() . "/block/block-regsister.php"; ?>
				</div>					
				<div class="fanpage-box">
					<?php include get_template_directory() . "/block/block-fanpage.php"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>