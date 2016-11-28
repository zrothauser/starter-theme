<?php
/**
 * A set of helper functions for the theme.
 */
namespace Company_Name\Project_Name\Theme\Helpers;

/**
 * Returns an SVG link for the named icon.
 *
 * @param string $name Name of the icon to use, should exist in SVG directory.
 *
 * @return string URL of SVG icon
 */
function svg_url( $name, $options = array() ) {
	return $href = ASSETS_DIRECTORY . '/svg/symbol-defs.svg#icon-' . $name;
}

/**
 * Returns an SVG element for the named icon.
 *
 * @param string $name Name of the icon to use.
 * @param array $options An array of options: role, class, and label
 */
function get_svg_icon( $name, $options = array() ) {
	$href = svg_url( $name );

	$role = empty( $options['role'] ) ? 'presentation' : $options['role'];

	$class = empty( $options['class'] ) ? 'icon icon-' . $name : 'icon ' . $options['class'];

	$label = ' aria-label="' . ( empty( $options['label'] ) ? $name : $options['label'] ) . '"';

	$label = 'presentation' === $role ? '' : $label;

	return sprintf( '<svg role="%s" class="%s"%s><use xlink:href="%s"/></svg>', esc_attr( $role ), esc_attr( $class ), esc_attr( $label ), esc_url( $href ) );
}

/**
 * Echoes an SVG element for the named icon.
 *
 * @param string $name Name of the icon to use.
 * @param array $options An array of options: role, class, and label
 */
function svg_icon( $name, $options = array() ) {
	echo get_svg_icon( $name, $options ); // xss safe
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'starter-theme' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
}
