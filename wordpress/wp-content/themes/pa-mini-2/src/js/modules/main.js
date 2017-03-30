"use strict";
import {qs} from '../common/helpers';
import Menu from './Menu';


export function init() {
    /**
     * Main Menu
     */
    let elMenu = qs('nav.main-menu');
    if (elMenu !== null) {
        new Menu(elMenu);
    }
}