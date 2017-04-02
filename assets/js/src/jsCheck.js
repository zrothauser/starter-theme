/**
 * Simple check to remove the .no-js class on the html element if JavaScript is enabled
 */

function jsCheck() {
	document.documentElement.classList.remove('no-js');
	document.documentElement.classList.add('js');
}

export default jsCheck;
