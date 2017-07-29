<?php

namespace VendorName\PluginName\PostTypes;

use PostTypes\PostType;
use Carbon_Fields\Field;
use Carbon_Fields\Container;
use VendorName\PluginName\Plugin;

class CPT extends Plugin
{

    public function __construct()
    {

        // Sample Custom Post Type - Client
        add_action( 'carbon_fields_loaded', [ $this, 'add_post_type_client' ] );

        // Hide unnecessary publishing options like Draft, visibility, etc.
        add_action( 'admin_head-post.php', [ &$this, 'hide_publishing_actions' ] );
        add_action( 'admin_head-post-new.php', [ &$this, 'hide_publishing_actions' ] );

    }


    public function add_post_type_client()
    {
        // Reference: https://github.com/jjgrainger/PostTypes

        $options = [
            'supports'            => [ 'title' ],
            'labels'              => [
                'menu_name' => 'Client List'
            ],
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => false,
            'rewrite'             => false,
            'has_archive'         => false
        ];

        $cpt = new PostType( [
            'name'     => 'client',
            'singular' => 'Client',
            'plural'   => 'Clients',
            'slug'     => 'client'
        ], $options );
        $cpt->icon( 'dashicons-star-filled' );

        // Add fields
        Container::make( 'post_meta', 'Client Details' )->show_on_post_type( $cpt->postTypeName )->add_fields( [
            Field::make( 'text', self::$prefix . 'name', 'Name' ),
            Field::make( 'text', self::$prefix . 'company', 'Company' ),
        ] );

        Container::make( 'post_meta', 'Contact Info' )->show_on_post_type( $cpt->postTypeName )->add_fields( [
            Field::make( 'text', self::$prefix . 'url', 'Web Site' ),
            Field::make( 'text', self::$prefix . 'phone', 'Phone Number' ),
            Field::make( 'textarea', self::$prefix . 'address', "Services" )->set_rows( 4 )
        ] );

    }


    public function hide_publishing_actions()
    {
        global $post;
        if ( in_array( $post->post_type, [ 'client' ] ) ) {
            echo '<style type="text/css">
        #misc-publishing-actions,
        #minor-publishing-actions{
          display:none;
        }
      </style>';
        }
    }

}
