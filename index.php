<?php
/**
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;

get_header(); ?>

	<header class="b-page-header">
		<h1 class="b-page-header__title">
			<?php single_post_title(); ?>
		</h1>
	</header>

	<div id="primary" class="b-content-area">
		<main id="main" class="b-main" role="main">
			<?php
			if ( have_posts() ) {

				while ( have_posts() ) {
					the_post();

					if ( is_search() || is_home() || is_archive() ) {
						get_template_part( 'template-parts/content-excerpt' );
					} else {
						get_template_part( 'template-parts/content' );
					}
				}

				the_posts_navigation();

			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
			?>
		</main><!-- .b-main -->
	</div><!-- .b-content-area -->

<?php
get_footer();
