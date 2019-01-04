<?php
/**
 * The template for displaying comments.
 *
*/


if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area p-mt-20">

	<!-- Have comment -> show comment -->
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title p-mb-10 p-mt-0">
			<?php
				printf( _nx( 'Bình luận (1)', 'Bình luận (%1$s)', get_comments_number(), 'comments title', TDM ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<!-- show comment -> callback function p_comment_list_template() -->
		<ul class="comment-list p-mb-20">
			<?php
				wp_list_comments( array(
					'callback' => 'p_comment_list_template'
				) );
			?>
		</ul><!-- .comment-list -->


	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Đã đóng bình luận.', TDM ); ?></p>
		
	<?php endif; ?>
	
	<div class="p-mt-0">
		<?php comment_form(); ?>
	</div>
</div><!-- .comments-area -->
