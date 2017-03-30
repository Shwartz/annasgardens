"use strict";
/*\_(ツ)_*/

import {init} from './modules/main';

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
    init();
});
