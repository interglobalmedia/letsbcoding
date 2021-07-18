<?php 

/* 
Plugin Name: Are You Paying Attention Quiz
Description: Provide your readers with a multiple choice question.
Version: 1.0
Author: Maria D. Campbell
Author URI: https://letsbcoding.com
*/

if(!defined('ABSPATH')) exit; // Exit if accessed directly

class AreYouPayingAttention {
    function __construct() {
        add_action('enqueue_block_editor_assets', array(
            $this,
            'adminAssets'
        ));
    }

    function adminAssets() {
        wp_enqueue_script('apaNewBlockType', plugin_dir_url(__FILE__) . 'build/index.js', array(   
            'wp-blocks',
            'wp-element'
        ));
    }
}

$areYouPayingAttention = new AreYouPayingAttention();