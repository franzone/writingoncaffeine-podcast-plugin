<?php
/*
Plugin Name: Writing on Caffeine Podcast Plugin
Plugin URI: https://tech.franzone.blog
Description: Custom page template for Writing on Caffeine podcast episodes
Version: 1.0
Author: Jonathan Franzone
Author URI: https://about.franzone.com
License: GPL2
*/

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

class WritingOnCaffeine_Franzone_Podcast {
    private $template_stub = 'episodes-archive'; // Updated URL stub to be more specific
    
    /**
     * Constructor
     */
    public function __construct() {
        // Hook into the template redirect
        add_filter('template_include', array($this, 'load_custom_template'));
        // Hook to enqueue styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
    }
    
    /**
     * Register and load the custom template
     */
    public function load_custom_template($template) {
        // Check if we're on a page
        if (is_page()) {
            // Get the current page slug
            $page_slug = get_post_field('post_name', get_post());
            
            // Check if the slug matches our custom template stub
            if ($page_slug === $this->template_stub) {
                // Get the path to our custom template file
                $custom_template = plugin_dir_path(__FILE__) . 'templates/writingoncaffeine-franzone-template.php';
                
                // If the template exists, use it
                if (file_exists($custom_template)) {
                    return $custom_template;
                }
            }
        }
        
        // If conditions aren't met, return the default template
        return $template;
    }
    
    /**
     * Enqueue styles when custom template is loaded
     */
    public function enqueue_styles() {
        // Check if we're on a page with our custom template
        if (is_page() && get_post_field('post_name', get_post()) === $this->template_stub) {
            wp_enqueue_style(
                'writingoncaffeine-franzone-styles', // Updated handle
                plugin_dir_url(__FILE__) . 'css/writingoncaffeine-franzone-styles.css', // Updated URL
                array(), // Dependencies
                '1.0', // Version
                'all' // Media
            );
        }
    }
}

// Initialize the plugin
new WritingOnCaffeine_Franzone_Podcast();
