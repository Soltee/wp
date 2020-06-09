<?php
/*
Plugin Name: Tutorials 
Plugin URL: Hello 
Description: A nice plugin to create your custom dashboard page
Version: 0.1
Author: Prabin Grg
Author URI: Hello 
Contributors: Prabin
Text Domain: Hello
*/


if( !defined('ABSPATH') )
{
	exit();
}

function create_post_types()
{
	$labels = array(
		'name' 				=> __('Tutorials', 'Post Type general Name', 'tutorials'),
		'singular_name' 	=> __('Tutorial', 'Post Type Singular Name', 'tutorials'),
		'menu_name'			=> __('Tutorials',  'tutorials'),
		'name_admin_bar'	=> __('Tutorials', 'tutorials'),
		'archives' 			=> __('Tutorials Achives', 'tutorials'),
		'attributes' 		=> __('Tutorials Attributes', 'tutorials'),
		'parent_item_colon'  => __('Parent Tutorial', 'tutorials'),
		'all_items'			 => __('All Tutorials ', 'tutorials'),
		'add_new_item' 		=> __('Add New Tutorial ', 'tutorials'),
		'add_new' 			=> __('Add New Tutorial ', 'tutorials'),
		'new_item'			 => __('New Tutorial ', 'tutorials'),
		'edit_item' 		=> __('Edit Tutorial ', 'tutorials'),
		'update_item'	  	=> __('Update Tutorial ', 'tutorials'),
		'view_item' 		=> __('View Tutorial ', 'tutorials'),
		'view_items' 		=> __('View Tutorials ', 'tutorials'),
		'search_items' 		=> __('Search Tutorials ', 'tutorials'),
		'not_found' 		=> __('Not Found ', 'tutorials'),
		'not_found_in_trash' 		=> __('Not Found in trash', 'tutorials'),
		'featured_image' 		=> __('Featured Image ', 'tutorials'),
		'set_featured_image' 		=> __('Set Featured Image ', 'tutorials'),
		'remove_featured_image' 		=> __('Remove Featured Image ', 'tutorials'),
		'use_featured_image' 		=> __('Use as Featured Image ', 'tutorials'),
		'insert_into_item' 		=> __('Insert Into Tutorial ', 'tutorials'),
		'uploaded_to_this_item' 		=> __('Uploaded to this Tutorial ', 'tutorials'),
		'item_lists' 		=> __('Tutorials list ', 'tutorials'),
		'item_lists_navigation' 		=> __('Tutorials list Navigation', 'tutorials'),
		'filter_items_list' 		=> __('Filter Tutorials list', 'tutorials'),
	);

	$args = array(
		'label' => __('Tutorials', 'tutorials'),
		'description' => __('Fullstack Dev Tutorials', 'tutorials'),
		'labels ' => $labels,
		'menu_icon' => 'dashicons-editor-video',
		'supports' =>  array(
				'title', 'editor', 'thumbnail', 'author'
			),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'heirarcial' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability' => 'post',
		'rewrite' => array('slug' => 'tutorials')
	);

	register_post_type( 'tutorials', $args );

}

add_action( 'init', 'create_post_types', 0 );



/*Flush*/
function rewrite_tuts_flush()
{
	create_post_types();
	flush_rewrite_rules();
}


register_activation_hook( __FILE__, 'rewrite_tuts_flush' );