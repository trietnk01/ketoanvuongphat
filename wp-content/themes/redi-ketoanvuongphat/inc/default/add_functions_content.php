<?php
// start insert contact
add_action( 'wp_ajax_insert_contact', 'func_ajax_insert_contact' );
add_action( 'wp_ajax_nopriv_insert_contact', 'func_ajax_insert_contact' );
function func_ajax_insert_contact(){	

	$checked=1;
	$msg=array();        
	$data=array();   
	$k=0;    

	$fullname = trim( $_POST['fullname'] );	
	$phone = trim( $_POST['phone'] );
	$email = trim( $_POST['email'] );	
	$title = trim( $_POST['title'] );
	$message = trim( $_POST['message'] );		

	if(mb_strlen($fullname) < 5){		
		$msg[$k] = 'Họ tên phải từ 5 ký tự trở lên'; 	   
		$data["fullname"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($phone) < 10){
		$msg[$k] = 'Điện thoại phải từ 10 ký tự trở lên'; 		  
		$data["phone"]='';        
		$checked = 0;
		$k++;
	}
	
	if(!preg_match("#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#", mb_strtolower($email,'UTF-8')   )){
		$msg[$k] = 'Email không hợp lệ'; 		
		$data["email"]='';           
		$checked = 0;
		$k++;
	}

	if(mb_strlen($title) < 5){		
		$msg[$k] = 'Tiêu đề phải từ 5 ký tự trở lên'; 	   
		$data["title"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($message) < 5){		
		$msg[$k] = 'Nội dung liên hệ phải từ 5 ký tự trở lên'; 	   
		$data["message"]='';        
		$checked = 0;
		$k++;
	}


	if($checked==1){
		$date_submit=datetimeConverter(date("Y-m-d"),"d/m/Y");	
		$post_title = $fullname." ngày ".$date_submit;
		$post_name = p_clear_slug( $post_title );
		
		
		$insert = array(
			'post_type' => 'zacontact',
			'post_title' => $post_title ,
			'post_name' =>  $post_name  ,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_content' => $message,
		);
		$post_id = wp_insert_post($insert);
		update_post_meta( $post_id, 'op_contacted_name', $fullname);
		update_post_meta( $post_id, 'op_contacted_phone', $phone );
		update_post_meta( $post_id, 'op_contacted_email', $email );
		update_post_meta( $post_id, 'op_contacted_title', $title );		
		
		$msg[$k]='Gửi thông tin thành công';  		
	}
	$result=array(
		"checked"       => 	$checked,       
		"msg"			=>	$msg,
		"dulieu"		=>	$data,		
	);
	echo json_encode($result);	
	die();
}
// end insert contact
// start insert quotation
add_action( 'wp_ajax_insert_quotation', 'func_ajax_insert_quotation' );
add_action( 'wp_ajax_nopriv_insert_quotation', 'func_ajax_insert_quotation' );
function func_ajax_insert_quotation(){	

	$checked=1;
	$msg=array();        
	$data=array();   
	$k=0;    

	$fullname = trim( $_POST['fullname'] );	
	$phone = trim( $_POST['phone'] );
	$email = trim( $_POST['email'] );		
	$message = trim( $_POST['message'] );		

	if(mb_strlen($fullname) < 5){		
		$msg[$k] = 'Họ tên phải từ 5 ký tự trở lên'; 	   
		$data["fullname"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($phone) < 10){
		$msg[$k] = 'Điện thoại phải từ 10 ký tự trở lên'; 		  
		$data["phone"]='';        
		$checked = 0;
		$k++;
	}
	
	if(!preg_match("#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#", mb_strtolower($email,'UTF-8')   )){
		$msg[$k] = 'Email không hợp lệ'; 		
		$data["email"]='';           
		$checked = 0;
		$k++;
	}
		

	if($checked==1){
		$date_submit=datetimeConverter(date("Y-m-d"),"d/m/Y");	
		$post_title = $fullname." ngày ".$date_submit;
		$post_name = p_clear_slug( $post_title );
		
		
		$insert = array(
			'post_type' => 'zaquotation',
			'post_title' => $post_title ,
			'post_name' =>  $post_name  ,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_content' => $message,
		);
		$post_id = wp_insert_post($insert);
		update_post_meta( $post_id, 'op_quotation_name', $fullname);
		update_post_meta( $post_id, 'op_quotation_phone', $phone );
		update_post_meta( $post_id, 'op_quotation_email', $email );				
		$msg[$k]='Gửi thông tin thành công';  		
	}
	$result=array(
		"checked"       => 	$checked,       
		"msg"			=>	$msg,
		"dulieu"		=>	$data,		
	);
	echo json_encode($result);	
	die();
}
// end insert quotation
?>

