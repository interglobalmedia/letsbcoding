<?php 

/* 
Plugin Name: Word Filter Plugin
Description: Replaces a list of words.
Version: 1.0
Author: Maria D. Campbell
Author URI: https://letsbcoding.com
*/

if(!defined('ABSPATH')) exit; // Exit if accessed directly

class WordFilterPlugin {
    function __construct() {
        add_action('admin_menu', array(
            $this,
            'wordFilterMenu'
        ));
    }

    function wordFilterMenu() {
        add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'wordfilter', array(
            $this,
            'wordFilterPage'
        ), 'dashicons-smiley', 100);
        add_submenu_page('wordfilter', 'Words To Filter', 'Words List', 'manage_options', 'wordfilter', array(
            $this,
            'wordFilterPage'
        ));
        add_submenu_page('wordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array(
            $this,
            'optionsSubPage'
        ));
    }

    function wordFilterPage() { ?>
        hello world.
    <?php }

    function optionsSubPage() { ?>
        hello world from the options page.
    <?php }
}

$wordFilterPlugin = new WordFilterPlugin();