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
	return trailingslashit( ASSETS_DIRECTORY ) . 'svg/symbol-defs.svg?ver=' . THEME_VERSION . '#' . $name;
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
		<span class="b-post-date__author">
			<span class="b-post-date__label"><?php esc_html_e( 'by ' ); ?></span>
			<a
				href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
				class="b-post-date__link"
			>
				<?php echo get_the_author(); ?>
			</a>
		</span>

		<span class="b-post-date__published">
			<span class="class="b-post-date__label"><?php esc_html_e( 'on ' ); ?></span>
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

/**
 * Displays a link to the Primary Category, if Yoast is enabled. If not, displays the categories.
 *
 * @param int $post_id  ID of the current post (defaults to current post)
 */
function primary_category( $post_id = null ) {

	if ( empty( $post_id ) ) {
		$post_id = get_the_ID();
	}

	$category = get_the_category();

	if ( empty( $category ) ) {
		return;
	}

	$category_display = '';
	$category_link = '';

	if ( class_exists( '\WPSEO_Primary_Term' ) ) {
		$wpseo_primary_term = new \WPSEO_Primary_Term( 'category', get_the_id() );
		$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
		$term = get_term( $wpseo_primary_term );

		if ( is_wp_error( $term ) ) {
			// Default to first category (not Yoast) if an error is returned
			$category_display = $category[0]->name;
			$category_link = get_category_link( $category[0]->term_id );
		} else {
			// Yoast Primary category
			$category_display = $term->name;
			$category_link = get_category_link( $term->term_id );
		}
	} else {
		// Default, display the first category in WP's list of assigned categories
		$category_display = $category[0]->name;
		$category_link = get_category_link( $category[0]->term_id );
	}

	// Display category
	if ( ! empty( $category_display ) ) :
		echo '<span class="post-category">';
		echo '<a href="' . esc_url( $category_link ) . '">' . esc_attr( $category_display ) . '</a>';
		echo '</span>';
	endif;
}
