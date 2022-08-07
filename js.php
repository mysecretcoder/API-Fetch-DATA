add_action( 'wp_enqueue_scripts', 'enqueue_api_script' );

function enqueue_api_script() {
   wp_enqueue_script( 'api-main-js', get_template_directory_uri() . '/js/api-main.js', NULL, 1.0, true );
}