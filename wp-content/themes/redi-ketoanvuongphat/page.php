<?php
/*
	Page - Template
*/
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
					<div>
						<div class="fb-comments" data-href="<?php echo @$permalink; ?>" data-width="500" data-numposts="5"></div>	
					</div>
				</div>
				<div class="col-lg-4">
					<?php include get_template_directory() . "/block/block-service.php"; ?>
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