<?php
/**
 * Uikit3 blocks
 *
 * https://getuikit.com/
 *
 * @package    UiKit3_blocks_plugin
 * @since      0.1
 * @author     Maurice Tadros, Yaidel Ferralize, Disnel Rodriguez
 * @link       https://bowriverstudio.com
 * @license    GNU-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:    Uikit 3 blocks for WordPress
 *
 */

namespace UiKit3_blocks_plugin;

if (!defined('ABSPATH')) {
    exit('Hello, Hello, Hello, what\'s going on here then?');
}


add_action('enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_assets');
/**
 * Enqueue the resources for the Uikit3 Blocks.
 */
function enqueue_assets(){

    $asset_file = include(plugin_dir_path(__FILE__) . '/build/index.asset.php');
    $build_url = plugin_dir_url(__FILE__) . '/build/';

    wp_enqueue_script(
        'uikit3-blocks-script',
        $build_url . 'index.js',
        $asset_file['dependencies'],
        $asset_file['version']
    );

    wp_enqueue_style(
        'uikit3-blocks-style',
        $build_url . 'style.css',
        '',
        filemtime(plugin_dir_path(__FILE__) . '/build/style.css')
    );
}


add_action( "enqueue_block_editor_assets", __NAMESPACE__ . '\enqueue_editor_assets', 100 );
/**
 * Enqueue editor Uikit3 Blocks only.
 */
function enqueue_editor_assets(){

    $build_url = plugin_dir_url(__FILE__) . '/build/';

    wp_enqueue_style(
        'uikit3-blocks-editor',
        $build_url . 'editor.css',
        '',
        filemtime(plugin_dir_path(__FILE__) . '/build/editor.css')
    );
}
