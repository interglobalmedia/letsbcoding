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
        wp_register_style('aypaQuizEditCSS', plugin_dir_url(__FILE__) . 'build/index.css');
        wp_register_script('aypaNewBlockType', plugin_dir_url(__FILE__) . 'build/index.js', array(   
            'wp-blocks',
            'wp-element',
            'wp-editor'
        ));
        register_block_type('aypaplugin/are-you-paying-attention', array(
            'editor_script' => 'aypaNewBlockType',
            'editor_style' =>  'aypaQuizEditCSS',
            'render_callback' => array(
                $this,
                'aypaHTML'
            )
        ));
    }

    function aypaHTML($attributes) {
        if (!is_admin()) {
            wp_enqueue_script('aypaAttentionFrontend', plugin_dir_url(__FILE__) . 'build/frontend.js', array(
            'wp-element'
        ));
        wp_enqueue_style('aypaAttentionFrontendCSS', plugin_dir_url(__FILE__) . 'build/frontend.css');
        }
        ob_start(); ?>
        <div class="paying-attention-update-me">
        <pre style="display: none;"><?php echo wp_json_encode($attributes) ?></pre>
        </div>
        <?php return ob_get_clean();
    }
}

$areYouPayingAttention = new AreYouPayingAttention();