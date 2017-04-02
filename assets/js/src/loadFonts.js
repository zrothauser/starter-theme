/**
 * Watch loading of web fonts.
 *
 * Replace this with the actual fonts.
 */
import FontFaceObserver from 'fontfaceobserver';

function loadFonts() {
	const sourceSansObserver = new FontFaceObserver('Source Sans Pro');

	sourceSansObserver.load().then(() => {
		document.documentElement.classList.add('fonts-loaded');
	});
}

export default loadFonts;