<?php
if (!defined('T_DIRE_URI')) {
  define('T_DIRE_URI', get_template_directory_uri());
}

function nspa_adjust_news_archive_query( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if ( $query->is_post_type_archive( 'news' ) ) {
    $query->set( 'posts_per_page', 1 );
  }
}
add_action( 'pre_get_posts', 'nspa_adjust_news_archive_query' );