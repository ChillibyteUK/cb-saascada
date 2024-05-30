<?php

function cb_register_taxes() {

    $args = [
        "label" => __( "Solutions", "cb-saascada" ),
        "labels" => [
            "name" => __( "Solutions", "cb-saascada" ),
            "singular_name" => __( "Solution", "cb-saascada" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "solutions",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "solutions", [ "page" ], $args );

    $args = [
        "label" => __( "APIs", "cb-saascada" ),
        "labels" => [
            "name" => __( "APIs", "cb-saascada" ),
            "singular_name" => __( "API", "cb-saascada" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "apis",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "apis", [ "page" ], $args );

    $args = [
        "label" => __( "Teams", "cb-saascada" ),
        "labels" => [
            "name" => __( "Teams", "cb-saascada" ),
            "singular_name" => __( "Team", "cb-saascada" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "apis",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "teams", [ "people" ], $args );

    $args = [
        "label" => __( "Partner Type", "cb-saascada" ),
        "labels" => [
            "name" => __( "Partner Types", "cb-saascada" ),
            "singular_name" => __( "Partner Type", "cb-saascada" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "apis",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "partner-type", [ "partners" ], $args );

}
add_action( 'init', 'cb_register_taxes' );
