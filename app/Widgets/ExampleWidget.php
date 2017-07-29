<?php

namespace VendorName\PluginName\Widgets;

use Carbon_Fields\Field;
use Carbon_Fields\Widget;

/**
 * A simply widget that displays a text field (title) and textarea.
 */
class ExampleWidget extends Widget
{

    public function __construct()
    {

        $this->setup( WidgetLoader::$prefix . 'example_widget', __( 'Plugin Widget - Example' ),
            'Displays a block with title/text', [
                Field::make( 'text', WidgetLoader::$prefix . 'widget_title',
                    'Title' )->set_default_value( 'Hello World!' ),
                Field::make( 'textarea', WidgetLoader::$prefix . 'widget_content',
                    'Content' )->set_default_value( 'Lorem Ipsum dolor sit amet' )
            ] );

    }


    // Called when rendering the widget in the front-end
    public function front_end( $args, $instance )
    {
        echo $args[ 'before_title' ] . $instance[ WidgetLoader::$prefix . 'widget_title' ] . $args[ 'after_title' ];
        echo '<p>' . $instance[ WidgetLoader::$prefix . 'widget_content' ] . '</p>';
    }

}
