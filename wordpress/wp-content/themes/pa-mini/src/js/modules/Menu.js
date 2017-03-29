import $$ from '../common/utils';
import {qs, qsa, hasClass, addClass, removeClass, toggleClass} from '../common/helpers';
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
        this.elHasSub = qsa('.menu-item-has-children', this.elMobMenu);

        this.adjustMenu();
        this.addMobMenuToDom();
    }

    adjustMenu() {
        // creating cats toggle button
        console.log('this.elHasSub: ', this.elHasSub);
        Array.prototype.forEach.call(this.elHasSub,  (el) => {
            console.log('el', el);
            let div = $$.make('div');
            addClass(div, '_btn-cat');
            addClass(el, face.str_hide);
            div.addEventListener(face.evClick, (e) => {
                this.toggleCategory(el, true);
                e.preventDefault();
            });
            el.appendChild(div);
        });
    }

    toggleCategory(el, isCat = false) {
        toggleClass(el, face.str_hide);
        // if cat and if has class _hide we close sub-cats
        if(isCat && hasClass(el, face.str_hide)) this.closeSubcats(el);
    }

    closeSubcats(el) {
        Array.prototype.forEach.call(el.querySelectorAll('ul'),  elUl => addClass(elUl, face.str_hide));
    }

    closeAllCats() {
        Array.prototype.forEach.call(this.elHasSub, (el) => {
            // closing .has_sub
            addClass(el, face.str_hide);
            Array.prototype.forEach.call(el.querySelectorAll('ul'), (elUl) => {
                // closing every sub-cat as well
                addClass(elUl, face.str_hide);
            });
        });
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