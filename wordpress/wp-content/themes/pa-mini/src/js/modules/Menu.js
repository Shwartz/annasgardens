import $$ from '../common/utils';
import {qs, qsa, hasClass, addClass, removeClass, toggleClass} from '../common/helpers';
import {face} from '../face';

export default class Menu {
    constructor(root) {
        // root -> current menu element
        this.root = root;
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
        this.elBtn.innerHTML = 'Toggle Menu';
        addClass(this.elBtnWrapper, 'mobile-menu-hamburger');
        this.elBtnWrapper.appendChild(this.elBtn);

        // clone existing menu
        this.elMobMenu = root.cloneNode(true);
        removeClass(this.elMobMenu, 'main-menu');
        this.elHasSub = qsa('.menu-item-has-children', this.elMobMenu);

        this.adjustMenu();
        this.addEvents();
        this.addMobMenuToDom();

        $$.binder(face.evResize, this.closeMobileMenu.bind(this));
    }

    addEvents() {
        // close button
        console.log('add events')
        this.elBtn.addEventListener(face.evClick, (e) => {
            e.preventDefault();
            (hasClass(document.body, '_show-mob-menu') ? this.closeMobileMenu() : this.showMobileMenu());
        });
        this.elOverlay.addEventListener(face.evClick, (e) => {
            this.closeMobileMenu();
        })
    }

    adjustMenu() {
        // creating cats toggle button
        Array.prototype.forEach.call(this.elHasSub,  (el) => {
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

    toggleCategory(el) {
        toggleClass(el, face.str_hide);
        // if cat and if has class _hide we close sub-cats
        if (hasClass(el, face.str_hide)) this.closeSubcats(el);
    }

    closeSubcats(el) {
        Array.prototype.forEach.call(el.querySelectorAll('ul'),  elUl => addClass(elUl, face.str_hide));
    }

    addMobMenuToDom () {
        this.elMobWrap.appendChild(this.elMobMenu);
        document.body.appendChild(this.elBtnWrapper);
        document.body.appendChild(this.elOverlay);
        document.body.appendChild(this.elMobWrap);
    }

    toggleBtn() {

    }

    showMobileMenu() {
        console.log('show menu')
        addClass(document.body, '_show-mob-menu')
    }

    closeMobileMenu() {
        if (!hasClass(document.body, '_show-mob-menu')) return;
        removeClass(document.body, '_show-mob-menu');
        setTimeout(() => {
            this.elMobMenu.style.visible = 'hidden';
        }, 300);
    }
}