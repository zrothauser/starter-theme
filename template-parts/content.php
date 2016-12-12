<?php
/**
 * Template part for displaying posts.
 *
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'b-post' ); ?>>

	<div class="b-entry-content">
		<?php
		if ( is_search() || is_home() || is_archive() ) {
			the_excerpt();
			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="button -uppercase">Read More</a>
			<?php
		} else {
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'starter-theme' ),
				'after'  => '</div>',
			) );
		}
		?>
	</div><!-- .entry-content -->

	<footer class="b-entry-footer">
		<?php
		if ( ! ( is_search() || is_home() || is_archive() || is_front_page() ) ) {
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'starter-theme' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged:  %1$s', 'starter-theme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
