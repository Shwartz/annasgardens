import $$ from '../common/utils';
import {qs, hasClass, addClass, removeClass, toggleClass} from '../common/helpers';
import {face} from '../face';

export default class Menu {
    constructor(root) {
        this.root = root;
        this.page = document.getElementById('page');
        this.elMobWrap = $$.make('div');
        addClass(this.elMobWrap, 'mob-menu');



        console.log('root: ', this.root);
    }

    addMobMenuToDom () {

    }

    toggleBtn() {

    }

    showMenu() {

    }

    hideMenu() {

    }
}