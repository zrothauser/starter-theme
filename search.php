<?php
/**
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;

get_header(); ?>

	<header class="b-page-header">
		<h1 class="b-page-header__title">
			<?php printf( esc_html__( 'Search Results for: %s', 'starter-theme' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
	</header>

	<div id="primary" class="b-content-area">
		<main id="main" class="b-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'search' );
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- .b-main -->
	</div><!-- #primary -->

<?php
get_footer();
