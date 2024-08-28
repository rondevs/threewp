<?php
/**
 * @package ThreeWP
 */
/*
Plugin Name: ThreeWP
Plugin URI: https://www.github.com/rondevs/threewp
Description: A plugin to integrate Three.js with WordPress for creating custom 3D models.
Version: 1.0.0
Author: Rownok Bosunia
Author URI: https://www.github.com/rondevs
License: GPLv2 or later
*/

defined('ABSPATH') or die("Off Limit Area!!");


// Enqueue Three.js script

function threewp_enqueue_scripts() {
    wp_enqueue_script('threejs', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'threewp_enqueue_scripts');
   