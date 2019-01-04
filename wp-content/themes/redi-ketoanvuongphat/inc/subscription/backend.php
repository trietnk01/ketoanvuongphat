<?php 

add_filter( 'wp_mail_charset', 'p_change_mail_charset' );
function p_change_mail_charset( $charset ) {
	return 'UTF-32';
}

add_action("admin_menu","p_add_admin_option_page");
function p_add_admin_option_page(){
	add_menu_page( 
		__('Gửi tin mới',TDM), // title 
		__('Gửi tin mới',TDM),  // menu
		"manage_options",
		"p-sendmail", // slug
		"", 
		"",
		"2" // vị trí
	);

	// Sub menu 1

	add_submenu_page( 
		"p-sendmail", // slug
		__('Gửi tin mới',TDM),
		__('Gửi tin mới',TDM),
		"manage_options",
		"p-sendmail", // slug
		"p_add_admin_option_page_template" // func
	);

	// Sub menu 2

	// add_submenu_page( 
	// 	"p-sendmail", // slug
	// 	__('Sub Gửi tin mới',TDM),
	//	__('Sub Gửi tin mới',TDM),
	// 	"manage_options",
	// 	"p-sendmail", // slug
	// 	"p_add_admin_option_page_template" // func
	// );

}

// func template
function p_add_admin_option_page_template(){
	
// Gọi thư viện img
wp_enqueue_media();
?>

<style type="text/css">
	/* img */
	.form_demo_img_preview{
		width: 100px;
		height: 100px;
		border:2px solid #ddd; 
		cursor:pointer;
		position: relative;
		display: inline-block;
	}

	.form_demo_img_preview:hover{
		border: 2px solid #5b9dd9;
	}

	.button-reset{
		display: inline-block !important;
	    text-decoration: none !important;
	    font-size: 13px !important;
	    line-height: 26px !important;
	    height: 28px !important;
	    margin: 0 !important;
	    padding: 0 10px 1px !important;
	    cursor: pointer !important;
	    border-width: 1px !important;
	    border-style: solid !important;
	    -webkit-appearance: none !important;
	    border-radius: 3px !important;
	    white-space: nowrap !important;
	    box-sizing: border-box !important;

	    color: #555 !important;
	    border-color: #ccc !important;
	    background: #f7f7f7 !important;
	    box-shadow: 0 1px 0 #ccc !important;
	    vertical-align: top !important;

	    margin-left: 10px !important;
	}
	.button-reset:hover{
		background: #fafafa !important;
 	    border-color: #999 !important;
    	color: #23282d !important;
	}
</style>

<?php

	//$option_name = 'p_subscription_option9';

	$logo_site = p_acf_o('logo_header');
	$email = get_option( 'p_list_subscription');



	$form_demo_title = "";
	$form_demo_textarea = "";
	$form_demo_content  = "";



	if (!empty($_POST['form_demo_submit'])) {


		$form_demo_title = isset($_POST['form_demo_title']) ? $_POST['form_demo_title'] : '';
		$form_demo_content = isset($_POST['form_demo_content']) ? stripslashes($_POST['form_demo_content']) : '';

	
		$subject = $form_demo_title;
		$message = $form_demo_content;
		

		$message = '<html><body>';
		$message = '<table bgcolor="#CCC" class="m_-1617490754804786701mail" style="margin-top:10;font-family:"Helvetica",san-serif;color:#444;max-width:900px" width="100%">
<tbody>
<tr>
<td>
<table align="center" bgcolor="white" cellpadding="0" cellspacing="0" class="m_-1617490754804786701content" style="margin-top:20px;border-radius:7px;width:100%;max-width:550px">
<tbody><tr bgcolor="#282828" class="m_-1617490754804786701header" height="75">
<td style="padding:20px 30px;border-radius:7px 7px 0px 0px;text-align:center">'.
	'<img src="'.$logo_site.'">' .
'</td>
</tr>
<tr class="m_-1617490754804786701hi-there">
<td style="padding:20px">
<table class="m_-1617490754804786701greeting" style="font-size:15px" width="100%">
<tbody><tr>
<td>';
	
		$message.= $form_demo_content;
		$message .= "</td></tr></tbody></table></body></html>";


		

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";


		wp_mail( $email, $subject, $message, $headers );


        // Show popup success
       	echo "<script type='text/javascript'>
			jQuery(function($) {
				$('#message').show();
			})
       		 </script>";

	}


?>
<!-- status success -->
<div id="message" class="updated fade hidden" style="margin:10px 0px"><p><strong><?php _e('Gửi thành công.',TDM); ?></strong></p></div>


<h1><?php _e('Bảng gửi email',TDM)?> <?php echo convert_smilies( ':)'); ?></h1>


<!-- form -->
<form id="form_demo" method="post"><!--  id - method post -->

   <table class="form-table">
		<tbody>

			<tr>
				<th scope="row"><label for="form_demo_title"><?php _e('Tiêu đề thông tin:',TDM) ?></label></th>
				<td><input name="form_demo_title" type="text" id="form_demo_title" value="<?php echo $form_demo_title ?>" class="regular-text"></td>
			</tr>


			<tr style="display: none">
				<th scope="row"><label for="form_demo_textarea"><?php _e('Textarea:',TDM) ?></label></th>
				<td><textarea name="form_demo_textarea" type="text" id="form_demo_textarea" class="regular-text"><?php echo $form_demo_textarea ?></textarea></td>
			</tr>

			<tr>
				<th scope="row"><label for="form_demo_textarea"><?php _e('Nội dung:',TDM) ?></label></th>
				   	<td>
				   		<div style="width:50em">
						<?php
							wp_editor( $form_demo_content , 'form_demo_content' );  // text, id, name
						?>
						</div>
				   	</td>
			</tr>
			
		
		</tbody>

	</table>
	
	<p class="submit">
		 <input type="submit" name="form_demo_submit" value="<?php _e('Gửi thông tin',TDM) ?>" class="button-primary"/>
         <input type="reset" name="form_demo_reset" value="<?php _e('Nhập lại',TDM) ?>" class="button button-reset"/><!-- * css -->
	</p>
</form>
<?php }
