"use strict";
// import $$ from './common/utils';
import {userAgent} from './common/userAgent';

/**
 * AppConfig - util to save defaults and do default checks only once
 */
class AppConfig {
	constructor() {
		this.config = {
			isMobile: userAgent(), // returns mob device string or false
			evClick: 'click',
			evResize: 'resize',
			evTouchstart: 'touchstart',
			str_mobile: '_mobile',
			str_hide: '_hide',
			str_show: '_show',
			str_current: '_current',
			str_last: '_last',
		};
	}
}

export default AppConfig;