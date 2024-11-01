<?php
/**
 * Plugin Name: VideoAsk
 * Plugin URI:  https://www.videoask.com/
 * Description: Getting feedback just got more personal
 * Version:     1.0.2
 * Author:      Typeform
 * Author URI:  https://www.typeform.com/
 * License:     Apache-2.0
 * License URI: https://directory.fsf.org/wiki/License:Apache-2.0
 *
 * @package videoask
 */

defined('ABSPATH') or die('No script kiddies please!');

function videoask_block_editor()
{
    wp_enqueue_script(
        'videoask-embed-script',
        plugin_dir_url(__FILE__) . 'dist/videoask-embed-block.js',
        array('wp-blocks', 'wp-i18n', 'wp-editor'),
        true
    );

    wp_enqueue_style(
        'videoask-embed-style',
        plugin_dir_url(__FILE__) . 'dist/style.css'
    );
}

function videoask_scripts_head()
{
    echo '<script type="text/javascript" src="https://www.videoask.com/embed/embed.js"></script>';
    echo '<script type="text/javascript" src="' . plugin_dir_url(__FILE__) . 'dist/videoask-elements.js"></script>';
}

// For gutenberg
if (function_exists('register_block_type')) {
    add_action('wp_head', 'videoask_scripts_head');
    add_action('enqueue_block_editor_assets', 'videoask_block_editor');
}
