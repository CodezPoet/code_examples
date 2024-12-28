<?php

// Search and replace text in posts
$search  = 'speling eror';
$replace = 'correct spelling';
$args    = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    's'              => $search,
);
$posts   = new WP_Query( $args );
if ( $posts->have_posts() ) {
    while ( $posts->have_posts() ) {
        $posts->the_post();
        $post_content    = get_the_content();
        $updated_content = str_replace( $search, $replace, $post_content );
        wp_update_post(
            array(
                'ID'           => get_the_ID(),
                'post_content' => $updated_content,
            )
        );
    }
    wp_reset_postdata();
}
