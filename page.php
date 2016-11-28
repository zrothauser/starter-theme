<?php
/**
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php
			endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
