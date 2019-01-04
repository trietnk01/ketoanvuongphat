<?php
wp_reset_postdata();
wp_reset_query();  

// df
$p_rp_repeat_post = [];

// ----------------------------
// post
// ----------------------------

global $post;
$categories = get_the_category( get_the_ID() );
foreach($categories as $individual_category){
  $category_id[]= $individual_category->term_id;
};  

$limit_post = 3;

$args_related = array(
	'post_type' => get_post_type( get_the_ID() ),
	'posts_per_page' => $limit_post,
	'category__in' => $category_id,
	'post__not_in' => array( get_the_ID() ),
	'orderby' => "Date",
	'order' => 'DESC',
	'ignore_sticky_posts' => false,
	"post_status" => "publish"
);

$the_query = new WP_Query( $args_related );
$total = $the_query->found_posts;


if ( $the_query->have_posts() && $total > 0 ) : $i = 1;
  	 	
	while ( $the_query->have_posts() ) : $the_query->the_post(); 	
			if ( $i > $limit_post ) break;

			$p_rp_repeat_post[] = get_the_ID();

	$i++; 
	endwhile;
	
endif;
wp_reset_postdata();
wp_reset_query();  

//print_r2($p_rp_repeat_post);
  
// ----------------------------
// ACF
// ----------------------------

$key_acf = "p_rp_repeat";



if( have_rows( $key_acf  ) ) : $i = 1;
	$p_rp_repeat_post = [];
    while( have_rows( $key_acf  ) ): the_row();
     	$p_rp_repeat_post[] = p_acfs_pp( $key_acf .  "_post","");
	$i++;endwhile;
endif; 

 
//print_r2($p_rp_repeat_post);
  
?>

<?php if( !empty( $p_rp_repeat_post ) ) { ?>
<div class="entry-related p-ptb-20">

	<h4 class="p-wg-title p-mb-20 p-bold">
		<?php echo t_pll('Bài viết liên quan', "related articles" )?>
	</h4>			
	
	<div class="">



	<?php 
	$i= 1;
	    foreach ($p_rp_repeat_post as $key => $value ) :
	    	$id = $value;
	     			
	 ?>

	 	

	 		<div class="div-related p-mb-40 p767-mb-20">
				<div class="row">
					<div class="col-xs-12 col-sm-5 p767-mb-10">
						<div class="related-img">
							
							<a href="<?php the_permalink( $id) ?>">
								<div style="background: url(<?php echo p_link_img("","", $id) ; ?>) no-repeat center/cover;padding-top:calc( 100% / ( 320 / 208 ) )">

								</div>
							</a>


						</div>
					</div>

					<div class="col-xs-12 col-sm-7">
						<div class="related-title">
					      <a href="<?php the_permalink( $id) ?>" class="p-fs-20 p-bold p-fs-20" style="color:black">
					      		<?php the_title( $id) ?>      			
					      </a>
					    </div>
						
						
					    <div class="related-on p-mb-20">
							<?php echo get_the_date('F j, Y', $id );  ?>
					   	</div> 
					
						
					    <div class="related-title">
					     	<?php the_excerpt( $id ) ?>
					    </div>

					   	
					
				    </div>
			  	</div>
			</div><div class="clearfix"></div>
			
	 

<?php $i++; endforeach; ?>

	</div><div class="clearfix"></div>

</div><div class="clearfix"></div><!-- end related -->




<?php } ?>



