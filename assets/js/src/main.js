// Dependencies
import 'babel-polyfill';
import svg4everybody from 'svg4everybody';

// Sources
import loadFonts from './loadFonts';
import enableMenuToggle from './enableMenuToggle';
import jsCheck from './enableMenuToggle';

// Run the check for JS
jsCheck();

// Run svg4everybody()
svg4everybody();

// Load fonts
loadFonts();

// Menus
enableMenuToggle();
