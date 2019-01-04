<div class="cate_wrapper">
	<h3 class="danhmuc">Danh mục</h3>
	<?php			
	$args = array( 
		'menu'              => '', 
		'container'         => '', 
		'container_class'   => '', 
		'container_id'      => '', 
		'menu_class'        => 'category_product',                             
		'echo'              => true, 
		'fallback_cb'       => 'wp_page_menu', 
		'before'            => '', 
		'after'             => '<button class="toggle"><i class="fa fa-angle-down" aria-hidden="true"></i></button>', 
		'link_before'       => '', 
		'link_after'        => '', 
		'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
		'depth'             => 3, 
		'walker'            => '', 
		'theme_location'    => 'cateproduct' ,
		'menu_li_actived'       => 'current-menu-item',
		'menu_item_has_children'=> 'menu-item-has-children',
	);
	wp_nav_menu($args);
	?>        						
</div>	
<div class="box_trade">
	<h3 class="thuonghieu_title">Thương hiệu</h3>
	<?php 
	$source_trade=array();
	if(isset($_POST['thuonghieu'])){
		$source_trade=$_POST['thuonghieu'];
	}
	?>
	<form name="frm_filter" method="POST">
		<ul class="ul_filter">
			<?php 
			$terms = get_terms( 
				array(
					'taxonomy' => 'za_trade',
					'hide_empty' => false, 
					'parent' => 0 
				) 
			);  			
			foreach($terms as $key => $value){
				$term_link=get_term_link( $value, 'za_trade' );
				if(in_array($value->term_id, $source_trade)){
					?>
					<li><input type="checkbox" name="thuonghieu[]" class="ckth" checked value="<?php echo $value->term_id; ?>" onchange="this.form.submit();" ><span class="mg"><a href="<?php echo @$term_link; ?>"><?php echo $value->name; ?></a></span></li>
					<?php
				}else{
					?>
					<li><input type="checkbox" name="thuonghieu[]" class="ckth" value="<?php echo $value->term_id; ?>" onchange="this.form.submit();" ><span class="mg"><a href="<?php echo @$term_link; ?>"><?php echo $value->name; ?></a></span></li>
					<?php
				}				
			}
			?>							
		</ul>
	</form>
</div>			
<div class="box_trade">
	<h3 class="thuonghieu_title">Vùng miền</h3>
	<?php 
	$source_trade=array();
	if(isset($_POST['vungmien'])){
		$source_trade=$_POST['vungmien'];
	}
	?>
	<form name="frm_filter" method="POST">
		<ul class="ul_filter">
			<?php 
			$terms = get_terms( 
				array(
					'taxonomy' => 'za_vungmien',
					'hide_empty' => false, 
					'parent' => 0 
				) 
			);  			
			foreach($terms as $key => $value){
				$term_link=get_term_link( $value, 'za_vungmien' );
				if(in_array($value->term_id, $source_trade)){
					?>
					<li><input type="checkbox" name="vungmien[]" class="ckth" checked value="<?php echo $value->term_id; ?>" onchange="this.form.submit();" ><span class="mg"><a href="<?php echo @$term_link; ?>"><?php echo $value->name; ?></a></span></li>
					<?php
				}else{
					?>
					<li><input type="checkbox" name="vungmien[]" class="ckth" value="<?php echo $value->term_id; ?>" onchange="this.form.submit();" ><span class="mg"><a href="<?php echo @$term_link; ?>"><?php echo $value->name; ?></a></span></li>
					<?php
				}				
			}
			?>							
		</ul>
	</form>
</div>