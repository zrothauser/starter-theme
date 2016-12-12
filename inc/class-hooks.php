<?php
/**
 * Hooks and theme setup.
 */
namespace Company_Name\Project_Name\Theme;

class Hooks {

	/**
	 * Set up WordPress hooks
	 */
	public function register_hooks() {

		// Front-end styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );

		// Register widget areas
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );

		// Excerpts
		add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length' ), 999 );
		add_filter( 'excerpt_more',   array( $this, 'excerpt_more' ), 999 );

		// Editor styles
		add_action( 'mce_css', array( $this, 'editor_styles' ) );
	}

	/**
	 * Set up theme defaults and register supported WordPress features.
	 */
	public function configure_theme() {
		load_theme_textdomain( 'starter-theme', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'starter_theme_content_width', 640 );
	}

	/**
	 * Register widget area and widgets.
	 */
	public function widgets_init() {
	}

	/**
	 * Enqueue styles.
	 */
	public function styles() {
		wp_enqueue_style(
			'starter-theme-style',
			ASSETS_DIRECTORY . 'css/starter-theme.min.css',
			array(),
			THEME_VERSION
		);
	}

	/**
	 * Enqueue scripts.
	 */
	public function scripts() {
		wp_enqueue_script(
			'starter-theme-js',
			ASSETS_DIRECTORY . 'js/starter-theme.min.js',
			array( 'underscore' ),
			THEME_VERSION,
			true
		);
	}

	/**
	 * Register menu areas.
	 */
	public function register_menus() {
		register_nav_menu( 'primary', __( 'Primary Menu', 'starter-theme' ) );
		register_nav_menu( 'footer', __( 'Footer Menu', 'starter-theme' ) );
	}

	/**
	 * Filter the except length.
	 *
	 * @param int $length Excerpt length.
	 * @return int (Maybe) modified excerpt length.
	 */
	public function custom_excerpt_length( $length ) {
		return 200;
	}

	/**
	 * Filter the excerpt "read more" string.
	 *
	 * @param string $more "Read more" excerpt string.
	 * @return string (Maybe) modified "read more" excerpt string.
	 */
	public function excerpt_more( $more ) {
		return '&hellip;';
	}

	/**
	 * Loads our styles in the TinyMCE editor.
	 */
	public function editor_styles( $mce_css ) {

		if ( ! empty( $mce_css ) ) {
			$mce_css .= ',';
		}

		$mce_css .= ASSETS_DIRECTORY . 'css/editor-styles.css';

		return $mce_css;
	}
}
