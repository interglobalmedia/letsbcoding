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
        add_action('init', array(
            $this,
            'adminAssets'
        ));
    }

    function adminAssets() {
        wp_register_script('aypaNewBlockType', plugin_dir_url(__FILE__) . 'build/index.js', array(   
            'wp-blocks',
            'wp-element'
        ));
        register_block_type('aypaplugin/are-you-paying-attention', array(
            'editor_script' => 'aypaNewBlockType',
            'render_callback' => array(
                $this,
                'aypaHTML'
            )
        ));
    }

    function aypaHTML($attributes) {
        ob_start(); ?>
        <h3>Today the sky is <?php echo esc_html($attributes['skyColor']) ?> and the grass is <?php echo esc_html($attributes['grassColor']) ?>.</h3>
        <?php return ob_get_clean();
    }
}

$areYouPayingAttention = new AreYouPayingAttention();