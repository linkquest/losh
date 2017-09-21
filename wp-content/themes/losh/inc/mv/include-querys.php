<?php
/**
 * Set paging for GeriJounal
 * @param type $query
 */
function adjust_gj_page_cnt( $query ) {
    if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'gerijournal' ) ) {
        if( get_query_var('paged') < 2 ){
        $query->set( 'posts_per_page', '11' );
        }
    }
}
add_action( 'pre_get_posts', 'adjust_gj_page_cnt' );

