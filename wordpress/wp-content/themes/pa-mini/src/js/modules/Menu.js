import $$ from '../common/utils';
import {qs, hasClass, addClass, removeClass, toggleClass} from '../common/helpers';
import {face} from '../face';

export default class Menu {
    constructor(root) {
        // root -> current menu element
        this.root = root;
        this.elPage = document.getElementById('page');
        // creating wrapper element for mob menu
        this.elMobWrap = $$.make('div');
        addClass(this.elMobWrap, 'mob-menu');
        //addClass(this.elMobWrap, face.str_hide);

        // overlay
        this.elOverlay = $$.make('div');
        addClass(this.elOverlay, '_overlay');

        // create close button
        this.elBtnWrapper = $$.make('div');
        this.elBtn = $$.make('button');
        this.elBtn.innerHTML = 'Close';
        addClass(this.elBtnWrapper, '_close');
        this.elBtnWrapper.appendChild(this.elBtn);

        // clone existing menu
        this.elMobMenu = root.cloneNode(true);
        removeClass(this.elMobMenu, 'main-menu');

        this.addMobMenuToDom();
    }

    addMobMenuToDom () {
        this.elPage.insertBefore(this.elMobWrap, this.elPage.firstChild);
        this.elMobWrap.appendChild(this.elBtn);
        this.elMobWrap.appendChild(this.elMobMenu);
    }

    toggleBtn() {

    }

    showMenu() {

    }

    hideMenu() {

    }
}