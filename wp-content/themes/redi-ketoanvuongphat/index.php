<?php
/*
	Home template default
*/	
	get_header();
	global $zController;
	$productModel=$zController->getModel("/frontend","ProductModel");
	$source_banner=get_field('op_banner_repeat','option');		
	?>
	<h1 style="display: none"><?php echo get_bloginfo( 'name','' ); ?></h1>
	<div class="banner_slideshow">
		<div class="owl_carousel_banner owl-carousel owl-theme owl-loaded">		
			<?php 
			foreach ($source_banner as $key => $value) {
				?>
				<div class="item">
					<div class="banner_box">
						<div><img src="<?php echo @$value["op_banner_repeat_img"]; ?>" alt="hinhanh"></div>
					</div>					
				</div>
				<?php
			}
			?>								
		</div>		
	</div>		
	<div class="box-service-mobile">
		<div class="container">
			<div class="row">
				<div class="col">
					<?php include get_template_directory() . "/block/block-service.php"; ?>		
				</div>
			</div>
		</div>		
	</div>
	<div class="box-news box-news-2">
		<div class="container">			
			<div class="row">
				<div class="col-lg-8">
					<form name="frm_category_hp" method="POST">
						<input type="hidden" name="filter_page" value="1" />
						<div>
							<?php 
							$args = array(
								'post_type' => 'post',  
								'orderby' => 'id',
								'order'   => 'DESC', 
								'tax_query'=>array(
									array(
										'taxonomy' => 'category',
										'field'    => 'slug',
										'terms'    => 'blog',
									)
								), 						
							);
							$the_query=new WP_Query($args);  
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
									?>
									<div class="box-item-news">
										<div class="row">
											<div class="col-md-6">
												<div class="bx-img">
													<div>
														<a href="<?php echo @$permalink; ?>">
															<figure>
																<div style="background-image: url(<?php echo @$featured_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (300 / 200))"></div>
															</figure>						
														</a>
													</div>		
													<div class="box-date"><?php echo @$date_post; ?></div>											
												</div>												
											</div>
											<div class="col-md-6">
												<h3 class="box-item-news-title"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h3>
												<div class="box-item-news-excerpt">
													<?php echo @$excerpt; ?>
												</div>
												<div class="box-item-readmore">
													<a href="<?php echo @$permalink; ?>">Xem thêm</a>
												</div>
											</div>
										</div>
									</div>
									<?php
								}
								wp_reset_postdata();
							}					
							?>					
						</div>	
						<div class="hool-pagination">
							<?php echo @$pagination->showPagination();   ?>	
						</div>		
					</form>												
				</div>
				<div class="col-lg-4">
					<div class="box-service-desktop">
						<?php include get_template_directory() . "/block/block-service.php"; ?>
					</div>					
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