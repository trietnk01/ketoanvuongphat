<?php 
/*

Single Loop - Related post

*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wp_reset_postdata();
wp_reset_query();  


global $post;

$categories = get_the_category( get_the_ID() );
foreach($categories as $individual_category){
  $category_id[]= $individual_category->term_id;
};  

$limit_post = 3;


$args_related = array(
	'post_type' => get_post_type( get_the_ID() ),
	'category__in' => $category_id,
	'post__not_in' => array( get_the_ID() ),
	'orderby' => "Date",
	'order' => 'DESC',
	'ignore_sticky_posts' => false,
	"post_status" => "publish"
);

$the_query = new WP_Query( $args_related );
$total = $the_query->found_posts;

if ( $total == 0 ) return;
?>

<!-- Has post -->
<div class="entry-related p-ptb-20">

	<h4 class="p-wg-title p-mb-20">
		<?php echo t_pll('Bài viết liên quan', "Related post" )?>
	</h4>			
	
	<div class="">

	  <?php
      	   if ( $the_query->have_posts() && $total > 0 ) :
      	  	 	$i = 1;
         		while ( $the_query->have_posts() ) : $the_query->the_post(); 	
         			if ( $i > $limit_post ) break;

         		?>
           			
					<div class="div-related p-mb-20">
						<div class="row">
							<div class="col-sm-3 p767-mb-10">
								<div class="related-img">
								

									<a href="<?php the_permalink() ?>">
										<div style="background: url(<?php echo p_link_img() ; ?>) no-repeat center/cover;padding-top:calc( 100% / ( 320 / 200 ) )">
										</div>
									</a>


								</div>
							</div>

							<div class="col-sm-8">
								<div class="related-title">
							      <a href="<?php the_permalink() ?>" class="p-cl-7 p-fs-20">
							      		<?php the_title() ?>      			
							      </a>
							    </div>
								
								<!--
							    <div class="related-on">
									<?php echo get_the_date('d/m/Y');  ?>
							   	</div> 
								-->
								
							    <div class="related-title">
							     	<?php the_excerpt() ?>
							    </div>

							   	
							
						    </div>
					  	</div>
					</div><div class="clearfix"></div>
			
    	<?php  
			$i++; 
			endwhile;
      		wp_reset_postdata();
       	endif;
       	wp_reset_query();  
       	?>
    
	</div><div class="clearfix"></div>

</div><div class="clearfix"></div><!-- end related -->
