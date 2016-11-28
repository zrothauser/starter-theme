<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="site-sidebar" role="complementary">
	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
</aside><!-- #secondary -->
