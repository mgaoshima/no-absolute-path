<?php
/**
 * @package No_Absolute_Path
 * @version 0.1
 */
/*
Plugin Name: No Absolute Path
Plugin URI: https://wordpress.org/plugins/no-abs-path
Description: No Absolute Path modifies absolute paths in posts, pages, attachments to root paths.
Author: Nozomi Oshima
Version: 0.1
Author URI:
*/

function abs_to_root( $url ) {
  $regex = '/^http(s)?:\/\/[^\/\s]+(.*)$/';
  if ( preg_match( $regex, $url, $m ) ) {
    $url = $m[2];
  }
  return $url;
}

add_filter('attachment_link', 'abs_to_root');
add_filter('wp_get_attachment_url', 'abs_to_root');
add_filter('page_link', 'abs_to_root');
add_filter('post_link', 'abs_to_root');
