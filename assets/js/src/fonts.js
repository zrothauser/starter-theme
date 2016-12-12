/**
 * Watch loading of web fonts.
 *
 * Replace this with the actual fonts.
 */
( function() {
	'use strict';

	var sofiaProObserver = new FontFaceObserver( 'SofiaPro' );

	sofiaProObserver.check().then(function () {
		document.documentElement.classList.add( 'fonts-loaded' );
	});

})();
