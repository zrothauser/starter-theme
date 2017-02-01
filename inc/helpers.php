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
	return trailingslashit( ASSETS_DIRECTORY ) . 'svg/symbol-defs.svg#' . $name;
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
 * Displays the social links, with an optional label.
 *
 * @param string $label An optional label to display before the links.
 * @param bool   $mini  True to display small icons, false to display the default size icons.
 * @param string $color One of three values: "light", "dark", "bright". Actual color is determined by CSS.
 */
function display_social_links( $label = false, $mini = true, $color = 'dark' ) {

	$facebook_link  = get_theme_mod( 'facebook-url', false );
	$twitter_link   = get_theme_mod( 'twitter-url', false );
	$instagram_link = get_theme_mod( 'instagram-url', false );

	include locate_template( 'template-parts/social-links.php' );
}

/**
 * Gets a nicely formatted string for the published date.
 */
function post_date() {

	// Get the dates
	$published_date          = get_the_date( DATE_W3C );
	$published_date_readable = get_the_date();
	$modified_date           = get_the_modified_date( DATE_W3C );
	$modified_date_readable  = get_the_modified_date();

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$has_been_modified = true;
	}

	ob_start();
	?>

	<div class="b-post-date">
		<span class="b-post-date__published">
			<span class="class="b-post-date__label"><?php esc_html_e( 'Posted on: ' ); ?></span>
			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="b-post-date__link">
				<time
					datetime="<?php echo esc_attr( $published_date ); ?>"
					class="b-post-date__date b-post-date__date--published"
				>
					<?php echo esc_html( $published_date_readable ); ?>
				</time>
			</a>
		</span>

		<?php if ( isset( $has_been_modified ) && true === $has_been_modified ) : ?>
			&nbsp;
			<span class="b-post-date__updated">
				<span class="class="b-post-date__label"><?php esc_html_e( 'Updated on: ' ); ?></span>
				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="b-post-date__link">
					<time
						datetime="<?php echo esc_attr( $modified_date ); ?>"
						class="b-post-date__date b-post-date__date--updated"
					>
						<?php echo esc_html( $modified_date_readable ); ?>
					</time>
				</a>
			</span>
		<?php endif; ?>
	</div>

	<?php
	$html = ob_get_contents();
	ob_end_clean();
	echo $html; // WPCS: XSS OK.
}
