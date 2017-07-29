<?php

namespace VendorName\PluginName;

class Core extends Plugin
{

    public function __construct()
    {

        if ( ! is_admin() && ! $this->is_ajax() ) {

            // Add page, post type and parent classes to <body> tag for selector targeting
            add_filter( 'body_class', [ &$this, 'add_body_classes' ] );

        }

        // Remove Emoji code from header
        if ( ! $this->is_ajax() ) {
            add_filter( 'init', [ &$this, 'disable_wp_emojicons' ] );
        }

    }


    /**
     * Returns string of addition CSS classes based on post type
     *
     * Returns CSS classes such as page-{slug}, parent-{slug}, post-type-{type} and
     *   category-{slug} for easier selector targeting
     *
     * @param array $classes An array of *current* body_class classes
     *
     * @return array Modified array of body classes including new ones
     */
    public function add_body_classes( $classes )
    {
        $parent_slug = Helpers::get_parent_slug( true );
        $categories  = is_single() ? Helpers::get_post_categories( true ) : [];

        // Add page, parent and post-type classes, if available
        $classes[] = 'page-' . Helpers::get_page_slug();
        if ( $parent_slug ) {
            $classes[] = 'parent-' . $parent_slug;
        }
        $classes[] = 'post-type-' . get_post_type();

        // Add category slugs
        foreach ( $categories as $cat ) {
            $classes[] = 'category-' . $cat;
        }

        return $classes;
    }


    /**
     * Disabled Emojicons in page headers
     */
    public function disable_wp_emojicons()
    {

        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        add_filter( 'tiny_mce_plugins', function ( $plugins ) {
            return is_array( $plugins ) ? array_diff( $plugins, [ 'wpemoji' ] ) : $plugins;
        } );

    }

}
