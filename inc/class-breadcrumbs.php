<?php
/**
 * Generates breadcrumbs to include in page templates.
 */
namespace Company_Name\Project_Name\Theme;

class Breadcrumbs {

	/**
	 * Set up WordPress hooks
	 */
	public function register_hooks() {
		add_action( 'starter_theme_breadcrumbs', array( $this, 'display_breadcrumbs' ) );
	}

	/**
	 * Generate and display the breadcrumbs.
	 */
	function display_breadcrumbs() {

		global $wp_query;

		$post_id = get_the_id();

		// Do not display on the homepage
		if ( is_front_page() ) {
			return;
		}

		// Build the breadcrumbs
		?>
		<div class="breadcrumb">
			<div class="breadcrumb-trail">

		<?php
		// Start with the homepage
		$this->_display_breadcrumb_item( __( 'Home', 'starter-theme' ), get_home_url(), false, 'breadcrumb-home' );

		if ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() ) {

			$this->_display_breadcrumb_item( post_type_archive_title( $prefix, false ), false, true );

		} elseif ( is_archive() && is_tax() && ! is_category() && ! is_tag() ) {

			// If post is a custom post type
			$post_type = get_post_type();
			$custom_tax_name = get_queried_object()->name;

			// If it is a custom post type display name and link
			if ( 'post' !== $post_type ) {

				$post_type_object = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );

				$this->_display_breadcrumb_item(
					$post_type_object->labels->name,
					$post_type_archive,
					false,
					'breadcrumb-post-type-' . $post_type
				);
			}

			$this->_display_breadcrumb_item(
				$custom_tax_name,
				false,
				true,
				'breadcrumb-archive'
			);

		} elseif ( is_single() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if ( 'post' !== $post_type ) {

				$post_type_object = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );

				$this->_display_breadcrumb_item(
					$post_type_object->labels->name,
					$post_type_archive,
					false,
					'breadcrumb-post-type-' . $post_type
				);
			}

			// Get post category info
			$category = get_the_category();

			if ( ! empty( $category ) ) {

				// Get last category post is in
				$last_category = end( array_values( $category ) );

				// Get parent any categories and create array
				$get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
				$cat_parents = explode( ',', $get_cat_parents );

				// Loop through parent categories and store in variable $cat_display
				$cat_display = '';

				foreach ( $cat_parents as $parent ) {
					$this->_display_breadcrumb_item(
						$parent,
						false,
						false
					);
				}
			}

			if ( ! empty( $last_category ) ) {

				// Check if the post is in a category
				$this->_display_breadcrumb_item(
					get_the_title(),
					false,
					true
				);

			} elseif ( ! empty( $cat_id ) ) {

				// Else if post is in a custom taxonomy
				$this->_display_breadcrumb_item(
					$cat_name,
					$cat_link,
					false
				);

				$this->_display_breadcrumb_item(
					get_the_title(),
					false,
					true
				);

			} else {

				$this->_display_breadcrumb_item(
					get_the_title(),
					false,
					true
				);
			}

		} elseif ( is_category() ) {

			// Category page
			$this->_display_breadcrumb_item(
				single_cat_title( '', false ),
				false,
				true
			);

		} elseif ( is_page() ) {

			// Standard page
			if ( wp_get_post_parent_id( $post_id ) ) {

				// If child page, get parents
				$ancestors = get_post_ancestors( $post_id );

				// Get parents in the right order
				$ancestors = array_reverse( $ancestors );

				// Parent page loop
				if ( ! isset( $parents ) ) {
					$parents = null;
				}

				foreach ( $ancestors as $ancestor ) {
					$this->_display_breadcrumb_item(
						get_the_title( $ancestor ),
						get_permalink( $ancestor ),
						false
					);
				}
			}

			$this->_display_breadcrumb_item(
				get_the_title(),
				false,
				true
			);

		} elseif ( is_tag() ) {

			// Tag page

			// Get tag information
			$term_id        = get_query_var( 'tag_id' );
			$taxonomy       = 'post_tag';
			$args           = 'include=' . $term_id;
			$terms          = get_terms( $taxonomy, $args );
			$get_term_id    = $terms[0]->term_id;
			$get_term_slug  = $terms[0]->slug;
			$get_term_name  = $terms[0]->name;

			// Display the tag name
			$this->_display_breadcrumb_item(
				$get_term_name,
				false,
				true
			);

		} elseif ( is_day() ) {

			// Day archive

			// Year link
			$this->_display_breadcrumb_item(
				get_the_time( 'Y' ),
				get_year_link( get_the_time( 'Y' ) ) . 'Archives',
				false
			);

			// Month link
			$this->_display_breadcrumb_item(
				get_the_time( 'm' ),
				get_year_link( get_the_time( 'm' ) ) . 'Archives',
				false
			);

			// Day display
			$this->_display_breadcrumb_item(
				( get_the_time( 'jS' ) . ' ' . get_the_time( 'M' ) . ' Archives' ),
				false,
				true
			);

		} elseif ( is_month() ) {

			// Month Archive

			// Year link
			$this->_display_breadcrumb_item(
				get_the_time( 'Y' ),
				get_year_link( get_the_time( 'Y' ) ) . 'Archives',
				false
			);

			// Month display
			$this->_display_breadcrumb_item(
				( get_the_time( 'M' ) . ' Archives' ),
				false,
				true
			);

		} elseif ( is_year() ) {

			// Display year archive
			$this->_display_breadcrumb_item(
				( get_the_time( 'Y' ) . ' Archives' ),
				false,
				true
			);

		} elseif ( is_author() ) {

			// Auhor archive

			// Get the author information
			global $author;
			$userdata = get_userdata( $author );

			// Display author name
			$this->_display_breadcrumb_item(
				$userdata->display_name,
				false,
				true
			);

		} elseif ( get_query_var( 'paged' ) ) {

			// Paginated archives
			$this->_display_breadcrumb_item(
				get_query_var( 'paged' ),
				false,
				true
			);

		} elseif ( is_search() ) {

			// Search results page
			$this->_display_breadcrumb_item(
				get_search_query(),
				false,
				true
			);

		} elseif ( is_404() ) {

			// 404 page
			$this->_display_breadcrumb_item(
				__( '404', 'starter-theme' ),
				false,
				true
			);
		}
		?>
			</div><!-- .breadcrumb-trail -->
		</div><!-- .breadcrumb -->
		<?php
	}

	/**
	 * Creates and displays the markup for the breadcrumb.
	 *
	 * @param string      $title         Title of the page being linked to.
	 * @param string      $link          Link to the page.
	 * @param bool        $is_current    If this is the current page or not - current pages should not get a link.
	 * @param bool|string $extra_classes A string or array containing class names for the breadcrumb.
	 */
	protected function _display_breadcrumb_item( $title, $link = false, $is_current = false, $extra_classes = false ) {

		// Basic class name for the <span> container
		$class_list = 'breadcrumb-item';

		// Current page gets a current class
		if ( $is_current ) {
			$class_list .= ' breadcrumb-current';
		}

		// If the extra classes were passed as an array, concatenate them. If it's just a string, add it on.
		if ( is_array( $extra_classes ) ) {
			foreach ( $extra_classes as $class_name ) {
				$class_list .= ' ' . $class_name;
			}
		} elseif ( is_string( $extra_classes ) ) {
			$class_list .= ' ' . $extra_classes;
		}

		// Display the markup for the breadcrumb
		?>
		<span class="<?php echo esc_attr( $class_list ); ?>">
			<?php if ( ! $is_current && ! empty( $link ) ) : ?>
				<a href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( $title ); ?>">
			<?php endif; ?>

				<?php echo esc_html( $title ); ?>

			<?php if ( ! $is_current && ! empty( $link ) ) : ?>
				</a>
			<?php endif; ?>
		</span>
		<?php
	}
}
