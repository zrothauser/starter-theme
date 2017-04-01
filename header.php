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

<div id="wrapper" class="b-site-wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'starter-theme' ); ?></a>

	<header class="b-header" role="banner">
		<div class="b-header__wrapper">

			<div class="b-header__logo">
				<?php the_custom_logo(); ?>
			</div>

			<button
				class="b-header__toggle"
				id="js-menu-toggle"
				aria-controls="menu"
				aria-expanded="false"
			>
				Menu
			</button>

			<nav
				id="js-header-navigation"
				class="b-header-navigation"
				role="navigation"
			>
				<?php wp_nav_menu( array(
					'theme_location'  => 'primary',
					'menu_id'         => 'js-header-menu',
					'container'       => false,
					'menu_class'      => 'b-header-menu',
					'walker'          => new Bem_Menu_Walker,
				) ); ?>
			</nav><!-- .b-header-navigation -->

		</div><!-- .b-header__wrapper -->
	</header><!-- .b-header -->

	<div id="content" class="b-page-content">
