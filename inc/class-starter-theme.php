<?php
namespace Company_Name\Project_Name\Theme;

use Company_Name\Project_Name\Theme\Helpers;

class Starter_Theme {

	/**
	 * Constructor.
	 *
	 * @param string $file
	 */
	public function __construct( $file ) {

		// Main theme functionality
		$this->hooks              = new Hooks();
		$this->breadcrumbs        = new Breadcrumbs();
		// $this->customizer_options = new Customizer_Options();
	}

	/**
	 * Default setup routine
	 *
	 * @uses add_action()
	 * @uses do_action()
	 *
	 * @return void
	 */
	public function setup() {
		// Hooks
		add_action( 'after_setup_theme', array( $this->hooks, 'register_hooks' ) );
		add_action( 'after_setup_theme', array( $this->hooks, 'configure_theme' ) );
		add_action( 'after_setup_theme', array( $this->hooks, 'content_width' ), 0 );
		add_action( 'after_setup_theme', array( $this->hooks, 'register_menus' ) );

		add_action( 'after_setup_theme', array( $this->breadcrumbs, 'register_hooks' ) );
		// add_action( 'after_setup_theme', array( $this->customizer_options, 'register_hooks' ) );

		do_action( 'starter_theme_loaded' );
	}
}
