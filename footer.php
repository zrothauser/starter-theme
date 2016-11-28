<?php
/**
 * The template for displaying the footer.
 *
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper -full-width">

			<nav id="footer-navigation" class="footer-navigation" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'menu_class'     => 'nav-menu -primary',
				) ); ?>

				<?php wp_nav_menu( array(
					'theme_location' => 'secondary-footer',
					'menu_id'        => 'secondary-footer-menu',
					'container'      => false,
					'menu_class'     => 'nav-menu -secondary',
				) ); ?>
			</nav><!-- .main-navigation -->

			<div class="footer-misc">
				<?php get_template_part( 'template-parts/social-follow' ); ?>

				<div class="copyright">Starter_Theme &copy; <?php echo esc_html( date( 'Y' ) ); ?></div>
			</div>

		</div><!-- .wrapper -->
	</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
