<form role="search" method="get" class="search-form" action="<?php echo trailingslashit( home_url() ) ?>">
	<div>	
	
    <input class="" placeholder="<?php echo t_pll('Tìm kiếm',"Search") ?>" type="text" value="" name="s" required>

    <button type="submit" class="" value="">
    	 <span class=""><i class="fa fa-search" aria-hidden="true"></i></span>
    </button>

    <!-- search product -->
    <!-- <input type="hidden" name="post_type" value="product"> -->

   	</div>
</form>