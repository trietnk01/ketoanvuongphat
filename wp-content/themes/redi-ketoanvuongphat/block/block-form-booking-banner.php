<?php 
global $acf_pr;
?>
<div class="wrap-form-booking wrap-form-booking-m d-block d-lg-none">
    <h2 class="heading-sect text-center p-mtb-15"><?php echo t_pll("Đặt phòng","Booking") ?></h2>
      <form action="" name="frm_booking_hp_mobile">      
        <?php
        $p_link=""; 
        if(strcmp($acf_pr,"_en")==0){               
          $p_link=site_url( 'booking', null );
        }else{
          $p_link=site_url( 'dat-phong',null );
        }

        $p_checkin_date="";
        $p_checkout_date="";
        
        

        $arr_checkin_date    = date_parse_from_format('Y-m-d',date("Y-m-d")) ;                            
        $ts_checkin_date    = mktime($arr_checkin_date['hour'], $arr_checkin_date['minute'], $arr_checkin_date['second'], $arr_checkin_date['month'], $arr_checkin_date['day'], $arr_checkin_date['year']);   

        $ts_checkout_date   = mktime($arr_checkin_date['hour'], $arr_checkin_date['minute'], $arr_checkin_date['second'], $arr_checkin_date['month'], $arr_checkin_date['day']+1, $arr_checkin_date['year']); 

        


        

        if(strcmp($acf_pr, "_en")==0){
          $p_checkin_date=date("m/d/Y", $ts_checkin_date);
          $p_checkout_date=date("m/d/Y", $ts_checkout_date);
          
        }else{
          $p_checkin_date=date("d/m/Y", $ts_checkin_date);
          $p_checkout_date=date("d/m/Y", $ts_checkout_date);                
          
        }
        ?>
        <input type="hidden" name="mb_p_link" value="<?php echo $p_link; ?>">      
        <input type="hidden" name="mb_acf_pr" value="<?php echo $acf_pr; ?>">      
        <div class="form-booking">
          <div class="row">
           
             <div class="col-12 col-lg-4">
              <label for="ngaydat">

                <?php echo t_pll("Ngày đặt","Put date") ?>

              </label>

              <input type="text" name="mb_checkin_date" class="form-control date_picker_put_date date-picker" placeholder="<?php echo t_pll("Vui lòng chọn ngày đặt phòng","Please select the date of your stay") ?>" value="<?php echo $p_checkin_date ?>">

            </div>
             <div class="col-12 col-lg-4">
              <label for="ngaytra">

                <?php echo t_pll("Ngày trả","Return date") ?>

              </label>

              <input type="text" name="mb_checkout_date" class="form-control date_picker_put_date date-picker" placeholder="<?php echo t_pll("Vui lòng chọn ngày trả phòng","Please select the date of your stay") ?>" value="<?php echo $p_checkout_date; ?>">

            </div>
             <div class="col-12 col-lg-4">
              <label for="songuoi">

                <?php echo t_pll("Số người","persons") ?>

              </label>
              <?php 
                  $term_booking_number_customer = get_terms( array(
                    'taxonomy' => 'za_booking_number_customer',
                    'hide_empty' => false, 
                    'parent' => 0 ) );                              
                    ?>    
               <select name="mb_number_person_id"  class="form-control custom-select" >
                 <?php 
                      foreach ($term_booking_number_customer as $key => $value) {
                        ?>
                        <option value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
                        <?php
                      }
                      ?>    
              </select>

            </div>
          </div>
          <div>
            <div class="contact_btn">
              <a href="javascript:void(0);" onclick="bookNowHomepageMobile();" class="btn-gra-tr text-center p-up">
                <?php echo t_pll("Đặt ngay","Book now") ?>
              </a>
            </div>  
            <div class="ajax_loader_contact"></div>
            <div class="clearfix"></div>     
          </div>   
          <div class="note">
            Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.
          </div>          
        </div>
        <script type="text/javascript" language="javascript">
          jQuery(document).ready(function($){   
            <?php 
            if(strcmp($acf_pr, "_en") == 0){
              ?>
              $( ".date_picker_put_date" ).datepicker({
                dateFormat: "mm/dd/yy",        
                changeYear: true,
                changeMonth: true,
                yearRange: "2000:2050"
              });
              <?php
            }else{
              ?>
              $( ".date_picker_put_date" ).datepicker({
                dateFormat: "dd/mm/yy",        
                changeYear: true,
                changeMonth: true,
                yearRange: "2000:2050"
              });
              <?php
            }
            ?>
          });
        </script>
      </form>
      
    </div>