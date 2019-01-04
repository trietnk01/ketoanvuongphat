jQuery(function($) {


function form_sub_acc_pre(){
   $('.btn-submits-sub').attr('disabled',true);
   $('#btn-new-user-spin').show();
   $('#btn-new-user-plane').hide();
}

function form_sub_acc_aft(){
   $('.btn-submits-sub').removeAttr('disabled');
   $('#btn-new-user-spin').hide();
   $('#btn-new-user-plane').show();
}


// return home url clear params
$('.box-complete-overlay-close').click(function(e){
  e.preventDefault();


  $('.box-complete-overlay').removeClass('active');

  $('.box-complete').removeClass('show');

     // default not return
    if ( p.pa_active != ""  ) {

       document.location.href = p.home_url;
    }


})




$( "#form_subscription_acc" ).submit(function(e) {
  e.preventDefault();

  var email = $(this).find('#email_subscription').val();

   $.ajax({
      type : "post", //Phương thức truyền post hoặc get
      dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
      url         : ajaxurl,
      data : {
          action: "func_ajax_scription", //Tên action
          email: email,
      },
      context: this,
      beforeSend: function(){
        form_sub_acc_pre();
      },
      success: function(response) {
          var kq = response.data;

          if ( kq == "1" ){

              form_sub_acc_aft();
              register_email_send();



          } else if( kq == "same" ) {
               form_sub_acc_aft();

               same_email_send();

          }

 
      },

  });

});


function register_email_send(){

  $('.box-complete-overlay').addClass('active'); 
  $('.box-complete').addClass('show');

  $('.box-complete-detail-wrap').addClass('hidden');
  $('.box-complete-register_email_send').removeClass('hidden');

}

function same_email_send(){

    $('.box-complete-overlay').addClass('active'); 
    $('.box-complete').addClass('show');

  $('.box-complete-detail-wrap').addClass('hidden');
  $('.box-complete-same_email_send').removeClass('hidden');
    
}




})