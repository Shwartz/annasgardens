"use strict";

/*\_(ツ)_*/

/* Story starts here */
/*
 Before appConfig size
 * bundle - 67kb
 * 	67kb
 * min - 29kb
 * 	33kb
 * */

import main from './modules/main';

function ready(fn) {
    // is content loaded
    if (document.readyState != 'loading'){
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

ready(function () {
    document.body.classList.remove('no-js');
    main.init();
});
