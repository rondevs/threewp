<?php
/**
 * @package ThreeWP
 */
/*
Plugin Name: ThreeWP
Plugin URI: https://www.github.com/rondevs/threewp
Description: A plugin to integrate Three.js with WordPress for creating custom 3D models.
Version: 2.0.2
Author: Rownok Bosunia
Author URI: https://www.github.com/rondevs
License: GPLv2 or later
Text Domain: threewp
*/

defined('ABSPATH') or die('Off Limit Area!!');

// Load the plugin's text domain for translations
add_action('plugins_loaded', 'threewp_plugin_load_textdomain');

function threewp_plugin_load_textdomain() {
    load_plugin_textdomain('threewp', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

// Register the shortcode
function threewp_shortcode() {
    return '<div id="threewp-container" style="display: none;"></div>'; // This can be modified as needed
}
add_shortcode('use_threewp', 'threewp_shortcode');

// Enqueue the bundled ThreeWP script based on shortcode presence
function threewp_plugin_enqueue_scripts() {
    // Check if we're on a singular post or page
    if (is_singular()) {
        global $post;

        // Check if the post content contains the [use_threewp] shortcode
        if (isset($post) && has_shortcode($post->post_content, 'use_threewp')) {
            wp_enqueue_script(
                'threewp-bundle',
                plugin_dir_url(__FILE__) . 'assets/js/threewp.bundle.min.js',
                array(),
                '1.0.0', // Add version number here
                true // Load in footer
            );

            // Add defer attribute for better loading performance
            add_filter('script_loader_tag', function($tag, $handle) {
                if ('threewp-bundle' === $handle) {
                    return str_replace(' src', ' defer src', $tag);
                }
                return $tag;
            }, 10, 2);
        }
    }
}
add_action('wp_enqueue_scripts', 'threewp_plugin_enqueue_scripts');

?>
