<?php
/**
 * Functions for adding .mov mime_types to LetsBCoding Theme
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @since LetsBCoding 1.0
 */

/**
 * Parameter Doc Comment
 *
 * @param array $mime_types stores video/quicktime mimetype as value.
 * @return array "$mime_types"
 */
function bcoding_customize_mime_types( $mime_types ) {
	$mime_types['mov'] = 'video/quicktime'; // Add video/quicktime $mime_type !
	return $mime_types;
}

add_filter( 'upload_mimes', 'bcoding_customize_mime_types', 10, 1 );

/**
 * Parameter Doc Comment
 *
 * @param array $extensions stores .mov extension as value.
 * @return array $extensions
 */
function bcoding_add_mov_to_wp_video( $extensions ) {
	$extensions [] = 'mov'; // Add .mov file $extensions to wp_video !
	return $extensions;
}

add_filter( 'wp_video_extensions', 'bcoding_add_mov_to_wp_video' );
