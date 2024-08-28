<?php
/**
 * @package ThreeWP
 */
/*
Plugin Name: ThreeWP
Plugin URI: https://www.github.com/rondevs/threewp
Description: A plugin to integrate Three.js with WordPress for creating custom 3D models.
Version: 1.1.0
Author: Rownok Bosunia
Author URI: https://www.github.com/rondevs
License: GPLv2 or later
*/

defined('ABSPATH') or die("Off Limit Area!!");


function enqueue_threejs_and_related_scripts() {
    // Register and enqueue Three.js
    wp_register_script('threejs', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js', array(), 'r128', true);
    wp_enqueue_script('threejs');
    
    // Register and enqueue Three-addons
    wp_register_script('three-addons', 'https://cdn.jsdelivr.net/npm/three-addons@1.2.0/build/three-addons.min.js', array('threejs'), null, true);
    wp_enqueue_script('three-addons');
    
   
    
}
add_action('wp_enqueue_scripts', 'enqueue_threejs_and_related_scripts');
   