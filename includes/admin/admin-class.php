<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class |UNIQUESTRING|_Admin_Main
{

	// list of model names used in the plugin
	public $models_collection = [
		'|UNIQUESTRING|_Main_Page_Model'
	];

	/*
	* |UNIQUESTRING|_Admin_Main constructor
	*/
	public function __construct()
	{

	}

	/*
	* Additional classes
	*/
	public function |uniquestring|_additional_classes()
	{

		// enqueue_scripts class
		|uniquestring|_require_class_file_admin( 'enqueue-scripts.php' );

		|UNIQUESTRING|_Enqueue_Scripts::|uniquestring|_register();


		// CPT class
		|uniquestring|_require_class_file_admin( 'cpt.php' );

		|UNIQUESTRING|CPTclass::createCPT();

	}

	/*
	* Models Connection
	*/
	public function |uniquestring|_models_collection()
	{

		// require model file
		foreach ( $this->models_collection as $model ) {
			
			|uniquestring|_use_model( $model );

		}		

	}

	/**
	* registration ajax actions
	*/
	public function |uniquestring|_registration_ajax_actions()
	{

		// ajax requests to main page
		|UNIQUESTRING|_Main_Page_Model::|uniquestring|_wp_ajax();

	}

	/*
	* Routes collection
	*/
	public function |uniquestring|_routes_collection()
	{

		// main menu item
		|UNIQUESTRING|_Route::|uniquestring|_get( '|UNIQUESTRING|_Main_Page_Controller', 'index', '', [
			'page_title' => 'Main Menu title',
			'menu_title' => 'Main menu'
		] );

		// sub menu item
		|UNIQUESTRING|_Route::|uniquestring|_get( '|UNIQUESTRING|_Main_Page_Controller', 'submenu', '', [
			'page_title' => 'Sub Menu title',
			'menu_title' => 'Sub menu'
		], 'sub_menu' );

		// hide menu item
		|UNIQUESTRING|_Route::|uniquestring|_get( '|UNIQUESTRING|_Main_Page_Controller', 'hidemenu', 'NULL', [
			'page_title' => 'Hidden Menu title',
		], 'hide_menu' );

		// sub settings menu item
		|UNIQUESTRING|_Route::|uniquestring|_get( '|UNIQUESTRING|_Main_Page_Controller', 'settings_menu_item_action', 'NULL', [
			'menu_title' => 'Settings Item',
			'page_title' => 'Title of settings page'
		], 'settings_menu_item', true );

	}

}

// Initialize
$initialize_admin_class = new |UNIQUESTRING|_Admin_Main();

// include classes
$initialize_admin_class->|uniquestring|_additional_classes();

// include models
$initialize_admin_class->|uniquestring|_models_collection();

// ajax requests
$initialize_admin_class->|uniquestring|_registration_ajax_actions();

// include controllers
$initialize_admin_class->|uniquestring|_routes_collection();