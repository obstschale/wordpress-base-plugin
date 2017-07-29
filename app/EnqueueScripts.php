<?php

namespace VendorName\PluginName;

class EnqueueScripts extends Plugin
{

    public function __construct()
    {

        add_action( 'wp_loaded', function () {
            $this->enqueue_frontend_scripts();
            $this->enqueue_admin_scripts();
        } );

    }


    /**
     * Enqueue scripts used on frontend of site
     */
    private function enqueue_frontend_scripts()
    {

        // Example enqueuing remote scripts (http://select2.github.io/)
        wp_enqueue_style( 'select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', null,
            '4.0.3' );
        wp_enqueue_script( 'select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', [ 'jquery' ],
            '4.0.3' );

        // Enqueuing custom CSS for child theme (Twentysixteen was used for testing)
        wp_enqueue_style( 'child-style', $this->get_script_url( 'public/css/site.css' ), [ 'select2' ],
            $this->get_script_version( 'public/css/site.css' ) );

    }


    /**
     * Enqueue scripts used in WP admin interface
     */
    private function enqueue_admin_scripts()
    {

        // Only load script(s) on edit pages
        // if( strstr($_SERVER['REQUEST_URI'], '/post-new.php') || strstr($_SERVER['REQUEST_URI'], '/post.php') ) {
        add_action( 'admin_enqueue_scripts', function () {
            // Load custom JavaScript in admin
            wp_enqueue_script( 'wordpress-base-plugin',
                plugins_url( '/public/js/wordpress-base.js', dirname( __FILE__ ) ) );
        } );
        //}

    }

}
