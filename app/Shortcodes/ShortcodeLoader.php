<?php

namespace VendorName\PluginName\Shortcodes;

use VendorName\PluginName\Plugin;

class ShortcodeLoader extends Plugin
{

    /**
     * @var array Shortcode class name to register
     */
    protected $shortcodes;

    public function __construct()
    {
        $this->shortcodes = [
            HelloShortcode::class,
        ];
    }


    public function init()
    {
        foreach ( $this->shortcodes as $shortcodeClass ) {
            $shortcode = new $shortcodeClass();
            if ( $shortcode instanceof ShortcodeInterface ) {
                $shortcode->addShortcode();
            } else {
                // We could log not added shortcodes here
            }
        }
    }
}
