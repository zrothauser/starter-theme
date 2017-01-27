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

			<nav id="footer-navigation" class="b-site-footer__navigation" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location'  => 'primary',
					'container'       => false,
					'menu_class'      => 'b-footer-menu',
					'depth'           => 1,
					'walker'          => new Bem_Menu_Walker,
				) ); ?>
			</nav><!-- .b-footer-navigation -->

			<div class="b-site-footer__misc">
				<?php Helpers\display_social_links( false, false, 'light' ); ?>

				<div class="b-sitefooter__copyright">
					&copy; <?php echo esc_html( date( 'Y' ) ); ?>
				</div>
			</div><!-- .b-site-footer__misc -->

		</div><!-- .b-site-footer__container -->
	</footer><!-- .b-site-footer -->
</div><!-- .b-site-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
