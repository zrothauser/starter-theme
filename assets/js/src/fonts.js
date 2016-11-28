/**
 * Watch loading of web fonts.
 */
( function() {
	'use strict';

	var sofiaProObserver = new FontFaceObserver( 'SofiaPro' );

	sofiaProObserver.check().then(function () {
		document.documentElement.classList.add( 'fonts-loaded' );
	});

})();
