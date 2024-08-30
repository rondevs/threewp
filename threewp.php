<?php
/**
 * @package ThreeWP
 */
/*
Plugin Name: ThreeWP
Plugin URI: https://www.github.com/rondevs/threewp
Description: A plugin to integrate Three.js with WordPress for creating custom 3D models.
Version: 2.0.1
Author: Rownok Bosunia
Author URI: https://www.github.com/rondevs
License: GPLv2 or later
Text Domain: threewp
*/

defined('ABSPATH') or die('Off Limit Area!!');

function three_js_integration_enqueue_scripts() {
    wp_register_script(
        'three-bundle-js',
        plugin_dir_url(__FILE__) . 'assets/js/three.bundle.js',
        array(), 
        '1.0.0',
        true 
    );
    
    wp_enqueue_script('three-bundle-js');
}
add_action('wp_enqueue_scripts', 'three_js_integration_enqueue_scripts');

function three_js_integration_add_defer_attribute($tag, $handle) {
    if ('three-bundle-js' === $handle) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'three_js_integration_add_defer_attribute', 10, 2);