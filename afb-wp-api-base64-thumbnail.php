<?php
/*
Plugin Name: AFB WP API Base64 Post Thumbnail
Plugin URI: http://techpress.rocks
Description: Create a Base64 thumbnail for offline use to use with apps accessing any WP API(v2)-enabled WordPress site
Author: Andrew F. Burton
Version: 1.0.0
Author URI: http://techpress.rocks
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'rest_api_init', 'afb_register_base64thumb' );
function afb_register_base64thumb() {
    register_rest_field( 'post',
        'base64thumb',
        array(
            'get_callback'    => 'afb_get_base64thumb',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
/**
 * Get the value of the "base64thumb" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function afb_get_base64thumb( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
