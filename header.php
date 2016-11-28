<?php
/**
 * @package Starter_Theme
 */
namespace Company_Name\Project_Name\Theme;

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/favicon.ico?v=' . THEME_VERSION ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'starter-theme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper -full-width">

			<?php the_custom_logo(); ?>

			<button class="b-header__toggle" id="js-menu-toggle" aria-controls="menu" aria-expanded="false">Menu</button>

			<nav id="header-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location'  => 'header-menu',
					'menu_id'         => 'js-header-menu',
					'container'       => false,
					'menu_class'      => 'b-header-menu',
					'walker'          => new Bem_Menu_Walker,
				) ); ?>
			</nav><!-- .main-navigation -->

		</div><!-- .wrapper -->
	</header><!-- .site-header -->

	<div id="content" class="site-content">
