<?php
/**
 * @package ThreeWP
 */
/*
Plugin Name: ThreeWP
Plugin URI: https://www.github.com/rondevs/threewp
Description: A plugin to integrate Three.js with WordPress for creating custom 3D models.
Version: 2.0.0
Author: Rownok Bosunia
Author URI: https://www.github.com/rondevs
License: GPLv2 or later
*/

defined('ABSPATH') or die("Off Limit Area!!");

function enqueue_three_bundle_js() {
    wp_enqueue_script(
        'three-bundle-js',
        plugin_dir_url(__FILE__) . 'assets/js/three.bundle.js',
        array(), 
        null, 
        true 
    );   
    
}
add_action('wp_enqueue_scripts', 'enqueue_three_bundle_js');