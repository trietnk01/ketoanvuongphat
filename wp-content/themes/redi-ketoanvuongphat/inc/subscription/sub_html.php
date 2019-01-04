

<div class="widget p-mt-10">
    <h4>
      
        <?php echo t_pll("Đăng ký nhận bản tin","Sign up for the newsletter") ?>
    </h4>
    <form action="." method="post" class="form-subscribe" accept-charset="utf-8" id="form_subscription_acc">
        <div class="input-group">

            <input type="email" required="" id="email_subscription" class="form-control" placeholder="<?php echo t_pll("Nhập email của bạn","Your email") ?>">
            


             <span class="input-group-btn">

                 <button type="submit" class="btn-submits btn-submits-sub btn">
                <i class="fa fa-paper-planes" id="btn-new-user-plane">Đăng ký </i>
                <i class="fa fa-circle-o-notch fa-spin" id="btn-new-user-spin" style="display: none;top: 38%;
                left: 40%"></i>
                
              </button>


        </div>
    </form>
</div>



<div class="box-complete-overlay">
  <div class="box-complete text-center">
      <a href="#" class="btn-close box-complete-overlay-close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>


     <div class="box-complete-detail-wrap hidden box-complete-register_email_send">

        <div class="box-complete-icon">
          <i class="fa fa-check-circle-o p-fs-100" aria-hidden="true"></i>
        </div>

        <div class="box-complete-title p-fs-30 p991-fs-20 p767-fs-18 p-bold">
           
          <?php echo t_pll("Đăng ký email thành công","Successful email signup") ?>
        </div>

        <div class="box-complete-link">

          <!-- <a href="#" class="v-view-more p-cl-w-i" style="pointer-events:none;border-bottom:1px dotted white">
            Đăng nhập mail 
          </a>
          để xác nhận. -->

        </div>

    </div>


  <div class="box-complete-detail-wrap hidden box-complete-same_email_send">

        <div class="box-complete-icon">
            <i class="fa fa-check-circle-o p-fs-100" aria-hidden="true"></i>
          </div>

          <div class="box-complete-title p-fs-30 p991-fs-20 p767-fs-18 p-bold">
           
            <?php echo t_pll("Email này đã đăng ký rồi !","This email is already registered !") ?>
          </div>

          <div class="box-complete-link">
         </div>

  </div>



  <div class="box-complete-detail-wrap hidden box-complete-check_email_active">

        <div class="box-complete-icon">
             <i class="fa fa-check-circle-o p-fs-100" aria-hidden="true"></i>
        </div>

        <div class="box-complete-title p-fs-30 p991-fs-20 p767-fs-18 p-bold">
            <?php echo t_pll("Xác nhận email thành công","Successful email validation") ?>
           
        </div>

        <div class="box-complete-link">
       </div>

  </div>



  <div class="box-complete-detail-wrap hidden box-complete-check_email_fail">

        <div class="box-complete-icon">
              <i class="fa fa-warning p-fs-70"></i>
          </div>

          <div class="box-complete-title p-fs-30 p991-fs-20 p767-fs-18 p-bold">
              

                 <?php echo t_pll("Xác nhận không thành công.<br/> Bạn vui lòng đăng ký lại","Confirmation failed. <br/> Please re-apply") ?>

          </div>

          <div class="box-complete-link">
         </div>

  </div>





     
  </div>
</div>


<?php 


 if ( is_home() ){
  if ( isset($_GET['active']) ){

   
    echo check_email_nhantintuc( $_GET['active'] );

  }
}


?>