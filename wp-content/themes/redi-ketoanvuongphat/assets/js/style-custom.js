function changePage(page,ctrl){
	jQuery('input[name=filter_page]').val(page);
	jQuery(ctrl).closest('form')[0].submit();	
}
function tuVanShowHide(){
	var tu_van_box_ctrl=jQuery('.tu_van_box');
	var right_value=jQuery(tu_van_box_ctrl).css("right");	
	if(right_value == '0px'){
		jQuery(tu_van_box_ctrl).css({
			right: '-180px'
		});
	}else{
		jQuery(tu_van_box_ctrl).css({
			right: '0px'
		});
	}	
}
function changeImg(image,title){    
		var image_detail=jQuery(".box_img_w");
		var imghtml='<a href="'+image+'"  class="smlightbox"><img src="'+image+'" alt="'+title+'"/></a>';        
		jQuery(image_detail).empty();
		jQuery(image_detail).append(imghtml);	
		jQuery('.smlightbox').simpleLightbox();
	}	 
function showFrmSearch(){
	jQuery('.pan_search').show();
}
function closeFrmSearch(){
	jQuery('.pan_search').hide();
}
jQuery(document).ready(function($){		
	/* begin counter */
	$('.counter').counterUp({
            delay: 10,
            time: 1000
        });
	/* end counter */
	/* begin tu_van_box */
	setInterval(tuVanShowHide,9000);
	/* end tu_van_box */
	$('.toggle').on('click',function(){
		var ul_root=$(this).closest('ul.category_product');
		var li_current= $(ul_root).find('li.current_li');
		$(li_current).children('ul').slideUp();		
		var li=$(this).closest('li');
		$(li).addClass('current_li');
		var ul= $(li).children('ul');
		var status=$(ul).css('display');
		if(status=='none'){
			$(ul).slideDown();
			console.log(status);
		}else{
			$(ul).slideUp();
			console.log(status);
		}		
	});
	$('.smlightbox').simpleLightbox();
	/* start set width iframe */
	var iframe = $('.fb-comments').find("iframe");
	$('.fb-comments').attr('data-width','100%');
	$(iframe).attr('width','100%');
	/* end set width iframe */
});