<?php

// Create Theme Options Page
if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'seattlepremiumtowncarservice Settings',
		'menu_title'	=> 'seattlepremiumtowncarservice Settings',
		'menu_slug' 	=> 'seattlepremiumtowncarservice-general-settings',
    'position'    => 7,
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-admin-generic',
		'redirect'		=> false
	));
}

//Services
function custom_post_type_services() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'name_admin_bar'     => 'Service',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Service',
        'new_item'           => 'New Service',
        'edit_item'          => 'Edit Service',
        'view_item'          => 'View Service',
        'all_items'          => 'All Services',
        'search_items'       => 'Search Services',
        'not_found'          => 'No Services found',
        'not_found_in_trash' => 'No Services found in Trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'services'),
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'tags'),
        'position'           => 2,
        'show_in_rest'       => true,
    );

    register_post_type('services', $args);
}
add_action('init', 'custom_post_type_services');

function custom_taxonomy_service_category() {
    $labels = array(
        'name'              => 'Service Categories',
        'singular_name'     => 'Service Category',
        'search_items'      => 'Search Service Categories',
        'all_items'         => 'All Service Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Service Category',
        'update_item'       => 'Update Service Category',
        'add_new_item'      => 'Add New Service Category',
        'new_item_name'     => 'New Service Category Name',
        'menu_name'         => 'Service Categories',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'service-category'),
    );

    register_taxonomy('service_category', array('services'), $args);
}
add_action('init', 'custom_taxonomy_service_category');

function custom_taxonomy_service_tags() {
    register_taxonomy('service_tag', 'services', array(
        'label'             => 'Service Tags',
        'rewrite'           => array('slug' => 'service-tag'),
        'hierarchical'      => false,
        'show_admin_column' => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
    ));
}
add_action('init', 'custom_taxonomy_service_tags');


// FAQ

function custom_post_type_faq() {
    $labels = array(
        'name'               => 'FAQs',
        'singular_name'      => 'FAQ',
        'menu_name'          => 'FAQs',
        'name_admin_bar'     => 'FAQ',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New FAQ',
        'new_item'           => 'New FAQ',
        'edit_item'          => 'Edit FAQ',
        'view_item'          => 'View FAQ',
        'all_items'          => 'All FAQs',
        'search_items'       => 'Search FAQs',
        'not_found'          => 'No FAQs found',
        'not_found_in_trash' => 'No FAQs found in Trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'faq'),
        'menu_icon'          => 'dashicons-editor-help',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('faq', $args);
}
add_action('init', 'custom_post_type_faq');


// Testimonials
function custom_post_type_testimonials() {
    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'menu_name'          => 'Testimonials',
        'name_admin_bar'     => 'Testimonial',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Testimonial',
        'new_item'           => 'New Testimonial',
        'edit_item'          => 'Edit Testimonial',
        'view_item'          => 'View Testimonial',
        'all_items'          => 'All Testimonials',
        'search_items'       => 'Search Testimonials',
        'not_found'          => 'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials found in Trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'testimonials'),
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'custom_post_type_testimonials');

// TOP Cities
function custom_post_type_top_cities() {
    $labels = array(
        'name'               => 'TOP Cities',
        'singular_name'      => 'TOP City',
        'menu_name'          => 'TOP Cities',
        'name_admin_bar'     => 'TOP City',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New TOP City',
        'new_item'           => 'New TOP City',
        'edit_item'          => 'Edit TOP City',
        'view_item'          => 'View TOP City',
        'all_items'          => 'All TOP Cities',
        'search_items'       => 'Search TOP Cities',
        'not_found'          => 'No TOP Cities found',
        'not_found_in_trash' => 'No TOP Cities found in Trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'top-cities'),
        'menu_icon'          => 'dashicons-location-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'tags'),
        'position'           => 3,
        'show_in_rest'       => true,
    );

    register_post_type('top_cities', $args);
}
add_action('init', 'custom_post_type_top_cities');

// Taxonomies for TOP Cities
function custom_taxonomy_top_city_category() {
    register_taxonomy('top_city_category', array('top_cities'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'          => 'TOP City Categories',
            'singular_name' => 'TOP City Category',
            'menu_name'     => 'TOP City Categories'
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'top-city-category')
    ));
}
add_action('init', 'custom_taxonomy_top_city_category');

function custom_taxonomy_top_city_tags() {
    register_taxonomy('top_city_tag', 'top_cities', array(
        'label'             => 'TOP City Tags',
        'rewrite'           => array('slug' => 'top-city-tag'),
        'hierarchical'      => false,
        'show_admin_column' => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
    ));
}
add_action('init', 'custom_taxonomy_top_city_tags');

// Create Theme Options Page
if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'seattlepremiumtowncarservice Settings',
        'menu_title'    => 'seattlepremiumtowncarservice Settings',
        'menu_slug'     => 'seattlepremiumtowncarservice-general-settings',
        'position'      => 7,
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-generic',
        'redirect'      => false
    ));
}

// Our Fleet
function custom_post_type_our_fleet() {
    $labels = array(
        'name'               => 'Our Fleet',
        'singular_name'      => 'Fleet',
        'menu_name'          => 'Our Fleet',
        'name_admin_bar'     => 'Fleet',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Fleet',
        'new_item'           => 'New Fleet',
        'edit_item'          => 'Edit Fleet',
        'view_item'          => 'View Fleet',
        'all_items'          => 'All Fleets',
        'search_items'       => 'Search Fleets',
        'not_found'          => 'No Fleets found',
        'not_found_in_trash' => 'No Fleets found in Trash'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'our-fleet'),
        'menu_icon'          => 'dashicons-car',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'tags'),
        'position'           => 4,
        'show_in_rest'       => true,
    );

    register_post_type('our_fleet', $args);
}
add_action('init', 'custom_post_type_our_fleet');

// Fleet Categories
function custom_taxonomy_fleet_category() {
    register_taxonomy('fleet_category', array('our_fleet'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'          => 'Fleet Categories',
            'singular_name' => 'Fleet Category',
            'menu_name'     => 'Fleet Categories'
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'fleet-category')
    ));
}
add_action('init', 'custom_taxonomy_fleet_category');

// Fleet Tags
function custom_taxonomy_fleet_tags() {
    register_taxonomy('fleet_tag', 'our_fleet', array(
        'label'             => 'Fleet Tags',
        'rewrite'           => array('slug' => 'fleet-tag'),
        'hierarchical'      => false,
        'show_admin_column' => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
    ));
}
add_action('init', 'custom_taxonomy_fleet_tags');
