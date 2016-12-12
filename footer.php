<?php
/**
 * The template for displaying the footer.
 *
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;
?>

	</div><!-- .b-page-content -->

	<footer class="b-site-footer" role="contentinfo">
		<div class="b-site-footer__container">

			<nav id="footer-navigation" class="b-footer-navigation" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location'  => 'header-menu',
					'container'       => false,
					'container_class' => 'b-site-footer__navigation',
					'menu_class'      => 'b-footer-menu',
					'depth'           => 1,
					'walker'          => new Bem_Menu_Walker,
				) ); ?>
			</nav><!-- .main-navigation -->

			<div class="b-site-footer__misc">
				<?php Helpers\display_social_links( false, false, 'light' ); ?>

				<div class="b-sitefooter__copyright">Starter Theme &copy; <?php echo esc_html( date( 'Y' ) ); ?></div>
			</div>

		</div><!-- .b-site-footer__container -->
	</footer><!-- .b-site-footer -->
</div><!-- .b-site-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
