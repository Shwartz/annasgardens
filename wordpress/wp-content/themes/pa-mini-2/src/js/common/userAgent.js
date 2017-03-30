"use strict";

export function userAgent() {
	const userAgent = navigator.userAgent;

	if (userAgent.match(/Android/i)) {
		return 'android';
	} else if (userAgent.match(/webOS/i)) {
		return 'webos';
	} else if (userAgent.match(/iPhone/i)) {
		return 'iphone';
	} else if (userAgent.match(/iPod/i)) {
		return 'ipod';
	} else if (userAgent.match(/iPad/i)) {
		return 'ipad';
	} else if (userAgent.match(/Windows Phone/i)) {
		return 'windows phone';
	} else if (userAgent.match(/SymbianOS/i)) {
		return 'symbian';
	} else if (userAgent.match(/RIM/i) || userAgent.match(/BB/i)) {
		return 'blackberry';
	} else {
		return false;
	}
}