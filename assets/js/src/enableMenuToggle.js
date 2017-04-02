/**
 * Handles toggling the navigation menu for small screens.
 */

function enableMenuToggle() {
	var siteWrapper        = document.getElementById('wrapper'),
		mobileToggleButton = document.getElementById('js-menu-toggle');

	// Return if the parts we need aren't there
	if (!mobileToggleButton || !siteWrapper) {
		return;
	}

	/**
	 * Toggle the menu from the menu button
	 */
	mobileToggleButton.addEventListener('click', function() {
		event.preventDefault();

		siteWrapper.classList.toggle( 'b-site-wrapper--menu-open' );
		mobileToggleButton.classList.toggle( 'b-header__toggle--open' );
	});
}

export default enableMenuToggle;
