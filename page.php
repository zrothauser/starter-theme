<?php
/**
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;

get_header(); ?>

	<header class="b-page-header <?php echo has_post_thumbnail() ? ' b-page-header__with-image' : ''; ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php endif; ?>

		<h1 class="b-page-header__title">
			<?php single_post_title(); ?>
		</h1>
	</header>

	<?php get_template_part( 'template-parts/featured-image' ); ?>

	<div id="primary" class="b-content-area">
		<main id="main" class="b-main" role="main">

			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content' );
			}
			?>

		</main><!-- .b-main -->
	</div><!-- .b-content-area -->

<?php
get_footer();
