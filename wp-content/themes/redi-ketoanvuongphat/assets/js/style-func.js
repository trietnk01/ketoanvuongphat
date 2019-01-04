function contactNow() {
	var fullname=jQuery('input[name="fullname"]').val();
	var phone=jQuery('input[name="phone"]').val();
	var email=jQuery('input[name="email"]').val();	
	var title=jQuery('input[name="title"]').val();
	var message=jQuery('textarea[name="message"]').val();		
	var data_item={
		"action"    : "insert_contact",
		"fullname"     : fullname,                    
		"phone"     : phone,                    
		"email"     : email,                    
		"title"     : title,                    
		"message"     : message		
	}	
	jQuery.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json", 		
		success     : function(data, status, jsXHR){				
			jQuery('.note').empty();
			jQuery('.note').removeClass('note-success');
			jQuery('.note').removeClass('note-danger');
			if(parseInt(data.checked)  == 1){
				jQuery('form[name="frm_contact"]').find('input').val('');
				jQuery('form[name="frm_contact"]').find('textarea').val('');
				jQuery('.note').addClass('note-success');				
			}else{
				jQuery('.note').addClass('note-danger');
			}	
			var data_msg=data.msg;			
			jQuery.each(data_msg,function(index,val){
				jQuery('.note').append('<div>'+val+'</div>');				
			});			
			setTimeout(function(){ jQuery('.note').fadeOut(); }, 60000);			
			jQuery('.note').fadeIn();			
			jQuery('.ajax_loader_contact').hide();
		},
		beforeSend  : function(jqXHR,setting){
			jQuery('.ajax_loader_contact').show();
		},
	});
}
function registerNow(ctrl) {
	var frm=jQuery(ctrl).closest('form');
	var fullname=jQuery(frm).find('input[name="fullname"]').val();
	var phone=jQuery(frm).find('input[name="phone"]').val();
	var email=jQuery(frm).find('input[name="email"]').val();		
	var message=jQuery(frm).find('textarea[name="message"]').val();		
	var data_item={
		"action"    : "insert_quotation",
		"fullname"     : fullname,                    
		"phone"     : phone,                    
		"email"     : email,                    		                
		"message"     : message		
	}	
	console.log(data_item);
	jQuery.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json", 		
		success     : function(data, status, jsXHR){				
			jQuery('.note').empty();
			jQuery('.note').removeClass('note-success');
			jQuery('.note').removeClass('note-danger');
			if(parseInt(data.checked)  == 1){
				jQuery('form[name="frm_dk_bg"]').find('input').val('');
				jQuery('form[name="frm_dk_bg"]').find('textarea').val('');
				jQuery('.note').addClass('note-success');				
			}else{
				jQuery('.note').addClass('note-danger');
			}	
			var data_msg=data.msg;			
			jQuery.each(data_msg,function(index,val){
				jQuery('.note').append('<div>'+val+'</div>');				
			});			
			setTimeout(function(){ jQuery('.note').fadeOut(); }, 60000);			
			jQuery('.note').fadeIn();			
			jQuery('.ajax_loader').hide();
			jQuery('.ajax_loader_contact').hide();
		},
		beforeSend  : function(jqXHR,setting){
			jQuery('.ajax_loader').show();
			jQuery('.ajax_loader_contact').show();
		},
	});
}