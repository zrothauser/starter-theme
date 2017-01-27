<?php
/**
 * Template part for displaying posts on archive pages.
 *
 * @package Trainer
 */
namespace Company_Name\Project_Name\Theme;

$article_classes = 'b-excerpt';

if ( has_post_thumbnail() ) {
	$article_classes .= ' b-excerpt__with-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?>>

	<div class="b-excerpt__main">
		<h2 class="b-excerpt__title">
			<a
				href="<?php echo esc_url( get_the_permalink() ); ?>"
				rel="bookmark"
				class="b-excerpt__title__link"
			>
				<?php the_title(); ?>
			</a>

			<?php if ( is_sticky() ) : ?>
				<?php echo Helpers\get_svg_icon( 'thumbtack', array( 'class' => 'b-excerpt__sticky-icon' ) ); // WPCS: XSS OK. ?>
			<?php endif; ?>
		</h2>

		<div class="b-excerpt__content">
			<?php the_excerpt(); ?>
		</div>

		<div class="b-excerpt__meta">
			<?php Helpers\post_date(); ?>
		</div>
	</div><!-- .b-excerpt__main -->

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="b-excerpt__image">
			<?php the_post_thumbnail( 'excerpt' ); ?>
		</div>
	<?php endif; ?>
</article><!-- #post-## -->
