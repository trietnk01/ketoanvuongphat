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
$totalItemsPerPage=get_option( 'posts_per_page' );
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
					<div>
						<?php 
						if(count(@$source_article) > 0){
							foreach ($source_article as $key => $value) { 
								?>
								<div class="box-item-news">
									<div class="row">
										<div class="col-md-4">
											<div class="bx-img">
												<div>													
													<a href="<?php echo @$value['permalink']; ?>">
														<figure>
															<div style="background-image: url(<?php echo @$value['featured_img']; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (600 / 400))"></div>
														</figure>						
													</a>
												</div>		
												<div class="box-date"><?php echo @$value['date_post']; ?></div>											
											</div>		
										</div>
										<div class="col-md-8">
											<h3 class="box-item-news-title"><a href="<?php echo @$value['permalink']; ?>"><?php echo @$value['title']; ?></a></h3>
											<div class="box-item-news-excerpt">
												<?php echo @$value['excerpt']; ?>
											</div>
											<div class="box-item-readmore">
												<a href="<?php echo @$value['permalink']; ?>">Xem thêm</a>
											</div>
										</div>
									</div>
								</div>
								<?php
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