<?php

namespace VendorName\PluginName\Shortcodes;

class HelloShortcode implements ShortcodeInterface
{

    public function addShortcode()
    {

        // Usage: [hello name="Daniel"]
        if ( ! shortcode_exists( 'hello' ) ) {
            add_shortcode( 'hello', [ $this, 'hello_world' ] );
        }

    }


    /**
     * A short code the returns "Hello {$name}!", if provided
     *
     * @param $atts array Shortcode Attributes
     *
     * @return string
     */
    public static function hello_world( $atts )
    {
        $atts = shortcode_atts( [
            'name' => 'world'
        ], $atts, 'hello' );

        return sprintf( __( 'Hello %s!', 'wordpress-base-plugin' ), $atts[ 'name' ] );
    }

}
