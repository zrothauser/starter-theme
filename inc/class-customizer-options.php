<?php
/**
 * Registers the Customizer settings.
 */
namespace Company_Name\Project_Name\Theme;

class Customizer_Options {

	/**
	 * Set up WordPress hooks
	 */
	public function register_hooks() {
		add_action( 'init', array( $this, 'social_link_options' ) );
	}

	/**
	 * Register options for the social links
	 */
	function social_link_options() {

		// Stores all the controls that will be added
		$options = array();

		// Stores all the sections to be added
		$sections = array();

		// Adds the sections to the $options array
		$options['sections'] = $sections;

		// More Examples
		$section = 'social-links';

		$sections[] = array(
			'id' => $section,
			'title' => __( 'Social Links', 'starter-theme' ),
			'priority' => '90',
		);

		$options['facebook-url'] = array(
			'id' => 'facebook-url',
			'label'   => __( 'Facebook', 'starter-theme' ),
			'section' => $section,
			'type'    => 'url',
		);

		$options['twitter-url'] = array(
			'id' => 'twitter-url',
			'label'   => __( 'Twitter', 'starter-theme' ),
			'section' => $section,
			'type'    => 'url',
		);

		$options['instagram-url'] = array(
			'id' => 'instagram-url',
			'label'   => __( 'Instagram', 'starter-theme' ),
			'section' => $section,
			'type'    => 'url',
		);

		// Adds the sections to the $options array
		$options['sections'] = $sections;

		$customizer_library = Customizer_Library::Instance();
		$customizer_library->add_options( $options );
	}
}
