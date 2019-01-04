<?php
/**
 * The template for displaying the Breadcrumb
 *
 * @package ptheme
 */

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 * @since ptheme 0.1

 */
if ( ! function_exists( 'p_breadcrumb' ) ) :
	function p_breadcrumb() {
		/* === OPTIONS === */
		$text['home']     = __( '<i class="fa fa-home"></i>', TDM ); // text for the 'Home' link
		$text['category'] = esc_html__( '%1$sThể loại "%2$s"', TDM ); // text for a category page
		$text['search']   = esc_html__( '%1$sKết quả tìm kiếm "%2$s"', TDM ); // text for a search results page
		$text['tag']      = esc_html__( '%1$sTag "%2$s"', TDM ); // text for a tag page
		$text['author']   = esc_html__( '%1$sTác giả "%2$s"', TDM ); // text for an author page
		$text['404']      = esc_html__( '404', TDM ); // text for the 404 page

		$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before      = '<span class="breadcrumb-current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb

		/* === END OF OPTIONS === */

		global $post, $paged, $page;
		$homelink    = home_url( '/' );
		$link_before = '<span class="breadcrumb-span">';
		$link_after  = '</span>';
		$slash		 = '<span class="breadcrumb-span-slash"> » </span>';
		$link_after  = $link_after . $slash;

		$link_attr   = '';
		$link        = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after ;

		$shop_name   = "Shop";


		if ( ! is_front_page() && !is_home() ) {
			// echo '
			// <div class="breadcrumb-area custom">
			// 	<div class="wrapper">
			// 		<nav class="entry-breadcrumbs">';

						echo sprintf( $link, esc_url( $homelink ), $text['home'] );

						if ( is_home() ) {
							if ( $show_current == 1 ) {
								echo $before . get_the_title( get_option( 'page_for_posts', true ) ) . $after;
							}

						}
						elseif ( is_category() ) {
							$thisCat = get_category( get_query_var( 'cat' ), false );
							if ( $thisCat->parent != 0 ) {
								$cats = get_category_parents( $thisCat->parent, true, false );
								$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
								$cats = str_replace( '</a>', '</a>' . $link_after, $cats );
								echo $cats;
							}
							echo $before . sprintf( $text['category'], '<span class="archive-text">', '</span>' . single_cat_title( '', false ) ) . $after;

						}
						elseif ( is_search() ) {
							echo $before . sprintf( $text['search'], '<span class="search-text">', '</span>' . get_search_query() ) . $after;

						}
						elseif ( is_day() ) {
							echo sprintf( $link, esc_url( get_year_link( get_the_time( __( 'Y', TDM ) ) ) ), get_the_time( __( 'Y', TDM ) ) ) ;
							echo sprintf( $link, esc_url( get_month_link( get_the_time( __( 'Y', TDM ) ), get_the_time( __( 'm', TDM ) ) ) ), get_the_time( __( 'F', TDM ) ) );
							echo $before . get_the_time( __( 'd', TDM ) ) . $after;

						}
						elseif ( is_month() ) {
							echo sprintf( $link, esc_url( get_year_link( get_the_time( __( 'Y', TDM ) ) ) ), get_the_time( __( 'Y', TDM ) ) ) ;
							echo $before . get_the_time( __( 'F', TDM ) ) . $after;

						}
						elseif ( is_year() ) {
							echo $before . get_the_time( __( 'Y', TDM ) ) . $after;

						}
						elseif ( is_single() && !is_attachment() ) {

							if ( get_post_type() != 'post' ) {
				

								$post_type = get_post_type_object( get_post_type() );
								$post_link = get_post_type_archive_link( 'post' );	

								// woocom
								if ( !is_product()) { 
								printf( $link, esc_url( $post_link ), $post_type->labels->singular_name );

								} else {
									$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
									echo $before;
									echo "<a href=".$shop_page_url.">".$shop_name."</a>"; // change lại ở trên cùng 
									echo $slash ;

								}

								if( $show_current == 1 ) {
									echo $before . get_the_title() . $after;
								}
							}
							else {
								// post
								$cat  = get_the_category();
								$cat  = $cat[0];
								$cats = get_category_parents( $cat, true, '' );
								if( $show_current == 0 ) {
									$cats = preg_replace( "#^(.+)$#", "$1", $cats );
								}
								$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
								$cats = str_replace( '</a>', '</a>' . $link_after, $cats );
								echo $cats;
								if( $show_current == 1 ) {
									echo $before . get_the_title() . $after;
								}


							}
						}
						elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
							$post_type = get_post_type_object( get_post_type() );


							/* woocom */
						
							echo isset( $post_type->labels->singular_name ) ? $before . $post_type->labels->singular_name  . $after : '';
					

						}
						elseif ( is_attachment() ) {
							$parent = get_post( $post->post_parent );
							$cat    = get_the_category( $parent->ID );

							if ( isset( $cat[0] ) ) {
								$cat = $cat[0];
							}

							if ( $cat ) {
								$cats = get_category_parents( $cat, true );
								$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
								$cats = str_replace( '</a>', '</a>' . $link_after, $cats );
								echo $cats;
							}

							printf( $link, esc_url( get_permalink( $parent ) ), $parent->post_title );
							if ( $show_current == 1 ) {
								echo $before . get_the_title() . $after;
							}

						}
						elseif ( is_page() && !$post->post_parent ) {
							if ( $show_current == 1 ) {
								echo $before . get_the_title() . $after;
							}

						}
						elseif ( is_page() && $post->post_parent ) {
							$parent_id   = $post->post_parent;
							$breadcrumbs = array();
							while( $parent_id ) {
								$page_child    = get_post( $parent_id );
								$breadcrumbs[] = sprintf( $link, esc_url( get_permalink( $page_child->ID ) ), get_the_title( $page_child->ID ) );
								$parent_id     = $page_child->post_parent;
							}
							$breadcrumbs = array_reverse( $breadcrumbs );
							for( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
								echo $breadcrumbs[$i];
							}
							if ( $show_current == 1 ) {
								echo $before . get_the_title() . $after;
							}

						}
						elseif ( is_tag() ) {
							echo $before . sprintf( $text['tag'], '<span class="tag-text">', '</span>' . single_tag_title( '', false ) ) . $after;

						}
						elseif ( is_author() ) {
							global $author;
							$userdata = get_userdata( $author );
							echo $before . sprintf( $text['author'], '<span class="author-text">', '</span>' . $userdata->display_name ) . $after;

						}
						elseif ( is_404() ) {
							echo $before . $text['404'] . $after;
						}

						if ( get_query_var( 'paged' ) ) {
							if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_shop() ) { // woocom
								echo ' (';
							}
							echo sprintf( esc_html__( 'Trang %s', TDM ), max( $paged, $page ) );
							if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_shop() ) { // woocom
								echo ')';
							}
						}
			// 		echo '
			// 		</nav><!-- .entry-breadcrumbs -->
			// 	</div><!-- .wrapper -->
			// </div><!-- .breadcrumb-area -->';
		}
	} // end p_breadcrumb_lists
endif;
