<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class |UNIQUESTRING|_Route_Registrar
{
	
	/**
	* set controller
	*/
	public $controller = '';

	/**
	* set action
	*/
	public $action = '';

	/**
	* set slug or parent menu slug
	*/
	public $slug = |UNIQUESTRING|_MAIN_MENU_SLUG;

	/**
	* set properties
	*/
	public $properties = [
		'page_title' 	=> 'Title of the page',
		'menu_title' 	=> 'Link Name',
		'capability' 	=> 'manage_options',
		'menu_slug' 	=> |UNIQUESTRING|_MAIN_MENU_SLUG,
		'function' 		=> '|UNIQUESTRING|_view_connector',
		'dashicons' 	=> 'dashicons-image-filter',
		'position' 	=> 111
	];

	/**
	* set slug of sub menu
	*/
	public $sub_menu_slug = false;

	/**
	* |UNIQUESTRING|_Route_Registrar constructor
	*/
	public function __construct( ...$args )
	{

		$this->|uniquestring|_set_data( ...$args );

	}

	/**
	* $controller 		- Controller
	*
	* $action 			- Action
	*
	* $slug 			- if NULL - menu item will investment into
	*						|UNIQUESTRING|_MAIN_MENU_SLUG menu item
	*
	* $menu_properties 	- menu properties
	*
	* $sub_menu_slug 	- slug of sub menu
	*
	*/
	public function |uniquestring|_set_data( $controller, $action, $slug = |UNIQUESTRING|_MAIN_MENU_SLUG, array $menu_properties, $sub_menu_slug = false )
	{

		// set controller
		$this->controller = $controller;

		// set action
		$this->action = $action;

		// set slug
		if( $slug == NULL ) {

			$this->slug = |UNIQUESTRING|_MAIN_MENU_SLUG;

		} else {

			$this->slug = $slug;

		}

		// set properties
		foreach ( $menu_properties as $key => $value ) {
			
			$this->properties[$key] = $value;

		}

		// callback function
		$|uniquestring|_callback_function_menu = '|uniquestring|_create_admin_main_menu';

		/*
		* check if it's submenu
		* set sub_menu_slug
		*/
		if( $sub_menu_slug !== false ) {

			$this->sub_menu_slug = $sub_menu_slug;

			$|uniquestring|_callback_function_menu = '|uniquestring|_create_admin_sub_menu';
			
		}

		// register admin menu
		add_action( 'admin_menu', array( $this, $|uniquestring|_callback_function_menu ) );

	}

	/**
	* Create Main menu
	*/
	public function |uniquestring|_create_admin_main_menu()
	{
			
		add_menu_page( __( $this->properties['page_title'], '|uniquestring|-domain' ),
			 __( $this->properties['menu_title'], '|uniquestring|-domain' ),
			 $this->properties['capability'],
			 $this->slug,
			 array( $this, '|uniquestring|_view_connector' ),
			 $this->properties['dashicons'], // icons https://developer.wordpress.org/resource/dashicons/#id
			 $this->properties['position'] );

	}

	/**
	* Create Sub menu
	*/
	public function |uniquestring|_create_admin_sub_menu()
	{
		
		add_submenu_page( $this->slug,
			 __( $this->properties['page_title'], '|uniquestring|-domain' ),
			 __( $this->properties['menu_title'], '|uniquestring|-domain' ),
			 $this->properties['capability'],
			 $this->sub_menu_slug,
			 array( $this, '|uniquestring|_view_connector' )
		);

	}

		public function |uniquestring|_view_connector()
		{
			echo '123';
		}

}