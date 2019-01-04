<?php
/*
 template comment 
*/
if( ! function_exists( 'p_comment_list_template' ) ){

function p_comment_list_template($comment, $args, $depth) { ?>

    <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

        <div id="div-comment-<?php comment_ID() ?>" class="single-reply">

            <div>
                 <?php
                    // Avatar author comment
                    if ( $args['avatar_size'] != 0 ) {
                        echo '<div class="comment-author-img">'.get_avatar( $comment, 50 ) . '</div>';
                    } 
                ?>   

                <div class="comment-author-name-time">

                    <div class="comment-author-name" >
                        <?php echo get_comment_author_link(); ?>
                    </div>

                    <div class="comment-time">
                        <i class="fa fa-clock-o"></i>
                       <?php printf( esc_html__('%1$s - %2$s',TDM), get_comment_time('H:i'), get_comment_date() ); ?> 
                    </div>

               </div>

            </div>
          
    
            <div class="comment-text"><?php comment_text(); ?></div>

            <?php if ( $comment->comment_approved == '0' ) { ?>
                <div class="p-fs-13 p-cl-r">
                    <?php esc_html_e( '(Bình luận đang chờ xét duyệt !)',TDM ); ?>
                <div>
            <?php } ?>
            
            <div class="comment-reply">

                <?php 
                // &rarr; Reply
                comment_reply_link(array_merge($args,array('depth'=>$depth,'max_depth'=>$args['max_depth'],'reply_text'=> __('&rarr; Trả Lời',TDM)))) ?>
            </div>

            <div>
                <?php edit_comment_link( __( '(Sửa bình luận này)',TDM ), '  ', '' ); ?>
            </div>

        </div><!-- end div -->

    </li><!-- end li -->
<?php
    }
}

// Modifly lại các field : author, email, url
if( ! function_exists( 'p_comment_form_fields' ) ){
    add_filter( 'comment_form_default_fields', 'p_comment_form_fields' );
    function p_comment_form_fields( $fields ) {
        $commenter = wp_get_current_commenter();
        
        $req      = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
        

        $author = 
            '<div class="form-group comment-form-author">' . 

                '<label for="author">' .
                     __( 'Họ và tên' , TDM ) . ( $req ? ' <span class="required">*</span>' : '' ) . 
                '</label> ' .

                '<input class="form-control" required id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.

            '</div>';


        $email = 
            '<div class="form-group comment-form-email">'.

                '<label for="email">' .
                     __( 'Email'  , TDM ) . ( $req ? ' <span class="required">*</span>' : '' ) .
                '</label> ' .

                '<input class="form-control"  required id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.

            '</div>';

        $url  = 
            '<div class="form-group comment-form-url">'.

                '<label for="url">' .
                     __( 'Website'  , TDM ) . 
                '</label> ' .

                '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . '/>'.
            '</div>';


        $fields   =  array(
            'author' => $author,
            'email'  => $email,
            'url'    => $url,
        );
        
        return $fields;
    }
}


// Chỉnh lại tiêu đề và khung bình luận này ở đầu tiên
if( ! function_exists( 'p_comment_form' )){    
    add_filter( 'comment_form_defaults', 'p_comment_form' );
    function p_comment_form( $args ) {

        $args['title_reply']       = __( 'Bình luận', TDM );
        // $args['title_reply_to']    = __( 'Trả lời bình luận', TDM );
        $args['cancel_reply_link'] = __( '( Đóng trả lời )',TDM );

        $args['comment_notes_before'] = "";

        $args['comment_field'] = 
            '<div class="form-group comment-form-comment">

                <label for="comment">' . __( 'Viết bình luận', TDM ) . '</label> 

                <textarea class="form-control" id="comment" required name="comment" cols="45" rows="8" aria-required="true" placeholder="'.__('Bình luận',TDM).'"></textarea>
            </div>';

        $args['class_submit'] = 'btn-submit-form btn btn-default'; // since WP 4.1
        $args['label_submit'] = __('&rarr; Gửi bình luận',TDM);
        return $args;
    }
}