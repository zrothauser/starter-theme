/**
 * Handles toggling the navigation menu for small screens.
 */

( function( window ) {
	var siteWrapper        = document.getElementById( 'wrapper' ),
		mobileToggleButton = document.getElementById( 'js-menu-toggle' );

	// The only browsers we support that don't have classList (which we'll use here) are IE8-9,
	// which probably won't be small enough to use the mobile bar, so just return.
	if ( ! ( 'classList' in document.createElement( '_' ) ) ) {
		return;
	}

	// Return if the parts we need aren't there
	if ( ! mobileToggleButton ) {
		return;
	}

	/**
	 * Toggle the menu from the menu button
	 */
	mobileToggleButton.addEventListener( 'click', function() {
		event.preventDefault();

		siteWrapper.classList.toggle( 'b-site-wrapper--menu-open' );
		mobileToggleButton.classList.toggle( 'b-header__toggle--open' );
	} );

} )( this );
