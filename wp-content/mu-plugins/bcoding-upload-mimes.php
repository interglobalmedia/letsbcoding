<?php
    //  add mime for .mov files
    function bcoding_customize_mime_types($mimeTypes) {
        $mimeTypes['mov'] = 'video/quicktime';
        return $mimeTypes;
    }

    add_filter( 'upload_mimes', 'bcoding_customize_mime_types', 10, 1 );

    function bcoding_add_mov_to_wp_video($extensions) {
        $extensions [] = 'mov';
        return $extensions ;
    }

    add_filter( 'wp_video_extensions', 'bcoding_add_mov_to_wp_video');
?>