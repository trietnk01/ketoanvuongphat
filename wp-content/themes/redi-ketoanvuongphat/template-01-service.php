<?php 
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
$args = $wp_query->query;	
$args['orderby']='id';
$args['order']='DESC';		
$s="";
if(isset($_POST["s"])){
	$s=trim($_POST["s"]);
}
if(!empty(@$s)){		
	$args["s"] =@$s;
}	 
$wp_query->query($args);
$the_query=$wp_query;	
/* start setup pagination */
$totalItemsPerPage=10;
$pageRange=3;
$currentPage=1; 
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];  
}
$productModel->setWpQuery($the_query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
    "totalItems"=>$totalItems,
    "totalItemsPerPage"=>$totalItemsPerPage,
    "pageRange"=>$pageRange,
    "currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination); 
/* end setup pagination */
$source_article=array();
if($the_query->have_posts()){
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$post_id=$the_query->post->ID;                                                                      
		$permalink=get_the_permalink($post_id);         
		$title=get_the_title($post_id);
		$excerpt=wp_trim_words( get_the_excerpt($post_id), 20, '...' ) ;
		$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
		$date_post='';
		$date_post=get_the_date('d/m/Y',@$post_id);      
		$row_article["title"]=$title;
		$row_article["permalink"]=$permalink;
		$row_article["featured_img"]=$featured_img;
		$row_article["date_post"]=$date_post;
		$row_article["excerpt"]=$excerpt;
		$source_article[]=$row_article;
	}
	wp_reset_postdata();	
} 
?>
<div class="box-news box-news-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<form name="frm_prduct_lst" method="POST">
					<input type="hidden" name="filter_page" value="1" />
					<input type="hidden" name="s" value="<?php echo @$_POST["s"]; ?>" />					
					<div class="dich-vu-box">
						<?php 
						$k=0;
						if($the_query->have_posts()){
							while ($the_query->have_posts()) {
								$the_query->the_post();
								$post_id=$the_query->post->ID;                                                                      
								$permalink=get_the_permalink($post_id);         
								$title=get_the_title($post_id);
								$excerpt=wp_trim_words( get_the_excerpt($post_id), 20, '...' ) ;
								$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
								$price=get_field('op_news_service_price',$post_id);
								$unit=get_field('op_news_service_unit',$post_id);
								$date_post='';
								$date_post=get_the_date('d/m/Y',@$post_id);      
								if($k%2==0){
									echo '<div class="row">';
								}								
								?>
								<div class="col-md-6">
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
								</div>
								<?php
								$k++;
								if($k%2==0 || $k == $the_query->post_count){
									echo '</div>';
								} 
							}
						}
						?>							
					</div>
					<div class="hool-pagination">
						<?php echo @$pagination->showPagination();   ?>	
					</div>						
				</form>				
			</div>
			<div class="col-lg-4">				
				<?php 
				$cssclass="rata";				
				if(is_category( 'blog' )){
					include get_template_directory() . "/block/block-service.php";
					$cssclass="ritan";
				}
				?>
				<div class="<?php echo $cssclass; ?>">
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