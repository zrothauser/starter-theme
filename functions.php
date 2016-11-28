<?php
namespace Company_Name\Project_Name\Theme;

define( 'THEME_VERSION', '0.1.0' );
define( 'ASSETS_DIRECTORY', get_template_directory_uri() . '/assets/' );

// Include files
include __DIR__ . '/inc/class-starter-theme.php';
include __DIR__ . '/inc/class-hooks.php';
include __DIR__ . '/inc/helpers.php';

// Load the theme
$starter_theme = new Starter_Theme( __FILE__ );
$starter_theme->setup();
