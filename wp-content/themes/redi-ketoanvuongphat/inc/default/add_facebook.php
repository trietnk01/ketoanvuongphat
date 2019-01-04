<?php
// ------------------------------------------
// js load fb
// ------------------------------------------

function p_fb_load( $app_id = "" ){ ?>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;

  <?php if( empty( $app_id ) ) { ?>

  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";

  <?php } else { ?>

    js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=" + "<?php echo $app_id ?>" + "&autoLogAppEvents=1";

  <?php } ?>

  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


</script>


<?php }

// ------------------------------------------
// meta notice app
// ------------------------------------------

function p_fb_app_id_admin( $app_id,$app_admin ){ ?>

<meta property="fb:app_id" content="<?php echo $app_id ?>"/>
<meta property="fb:admins" content="<?php echo $app_admin ?>">

<?php }


// ------------------------------------------
// Link fanpage fb
// ------------------------------------------

function p_fb_fp($link_fanpage){
     if( empty($link_fanpage) ) return; 
?>

<div class="fb-page" data-href="<?php echo $link_fanpage ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $link_fanpage ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $link_fanpage ?>"></a></blockquote></div>

<?php } 


// ------------------------------------------
// Comment fb
// ------------------------------------------

// Ex: echo theme_fb_cmt( get_the_permalink() );
function p_fb_cmt( $link ) {  if( empty($link) ) return;  ?>
  <?php //if( comments_open() ) { ?>
<div id="ja-fb-comments" class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-width="100%" data-numposts="10" data-href="<?php echo $link; ?>" fb-xfbml-state="rendered"></div>

<?php //} 
}

