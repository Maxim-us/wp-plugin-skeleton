<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

final class |UniqueClassMame|
{

	/*
	* |UniqueClassMame| constructor
	*/
	public function __construct()
	{

		$this->define_constants();
		
		$this->include();

	}

	/*
	* Define |UNIQUESTRING| constants
	*/
	public function define_constants()
	{

		$this->|uniquestring|_define( '|UNIQUESTRING|_TABLE_SLUG', '|uniquestring|_table_slug' );

		// include php files
		$this->|uniquestring|_define( '|UNIQUESTRING|_PLUGIN_ABS_PATH', dirname( |UNIQUESTRING|_PLUGIN_PATH ) . '\\' );

		// version
		$this->|uniquestring|_define( '|UNIQUESTRING|_PLUGIN_VERSION', time() ); // Must be replaced before production on for example 1.0


	}

	/*
	* Incude required core files
	*/
	public function include()
	{

		// Basis functions
		require_once |UNIQUESTRING|_PLUGIN_ABS_PATH . 'includes\class-basis-plugin-class.php';

		// Helpers
		require_once MXSBAP_PLUGIN_ABS_PATH . 'includes\core\helpers.php';

		// Part of the Frontend
		require_once |UNIQUESTRING|_PLUGIN_ABS_PATH . 'includes\frontend\class-frontend-main.php';

		// Part of the Administrator
		require_once |UNIQUESTRING|_PLUGIN_ABS_PATH . 'includes\admin\class-admin-main.php';

	}

	// Define function
	private function |uniquestring|_define( $mame, $value )
	{

		if( ! defined( $mame ) )
		{

			define( $mame, $value );

		}

	}


}