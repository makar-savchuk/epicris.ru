<?php
/**
 * Plugin Name: Use http 1.1 in Imagify
 * Description: Use http 1.1 during Imagify’s image optimization.
 * Version: 1.0
 * Author: WP Media
 * Author URI: https://wp-media.me/
 * Licence: GPLv2
 *
 * Copyright 2019 WP Media
 */

defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

add_filter( 'imagify_curl_http_version_1_0', '__return_false' );
