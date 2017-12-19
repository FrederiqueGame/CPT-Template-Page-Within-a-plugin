/*
--------------------------------------------------------------------------
 FILTERS
--------------------------------------------------------------------------
*/

add_filter( 'page_template', 'col_page_template' );
function col_page_template( $page_template )
{
    if ( is_page( 'activite' ) ) {
        $page_template = dirname( __FILE__ ) . '/templates/single-activites.php';
    }
    return $page_template;
}



/*
--------------------------------------------------------------------------
 FILTERS
--------------------------------------------------------------------------
*/

add_filter('single_template', 'my_custom_template');

function my_custom_template($single) {

    global $wp_query, $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'activite' ) {
        if ( file_exists( PLUGIN_PATH . '/templates/single-activites.php' ) ) {
            return PLUGIN_PATH . '/templates/single-activites.php';
        }
    }

    return $single;

}




