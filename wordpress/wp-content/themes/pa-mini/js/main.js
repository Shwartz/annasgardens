/**
 * Created with JetBrains PhpStorm.
 * User: andris
 * Date: 13.9.4
 * Time: 22:25
 * To change this template use File | Settings | File Templates.
 */

(function($) {
    var pamini = pamini || {};

    pamini.menuSuperFish = function() {
        pamini.s.navHeaderMenu.superfish();
    };

    pamini.jsPanel = function() {
        var jPM = $.jPanelMenu({
            menu: pamini.s.navHeaderMenu,
            trigger: '#mobSelectorWrap'
        });
        return jPM;

    };

    pamini.jRespond = function() {
        var jPM = pamini.jsPanel();
        var jRes = jRespond([
            {
                label: 'handheld',
                enter: 0,
                exit: 764
            }
        ]);
        jRes.addFunc({
            breakpoint: 'handheld',
            enter: function() {
                jPM.on();//creating side mob menu
                /* to reduce flickering on mob phones, first I capture click event
                 * then trigger main menu slide out of view
                 * only then moving to next page (200ms)
                 * */
                $(jPM.menu).find('a').click(function (e) {
                    var url = this.getAttribute('href');
                    e.preventDefault();
                    jPM.trigger();
                    window.setTimeout(function() {
                        window.location = url;
                    }, 200);
                });
                $('.sub-menu').removeAttr('style'); //remove submenu flickering > 764 || or missing children < 764
            },
            exit: function() {
                jPM.off();
                $('.sub-menu').css('display','none'); //adding but attr, otherwise there won't be nice fadeIn effect on submenu
            }
        })
    }

    //HTML is ready, let's kick JS
    $(document).ready(function(){
        //settings, DOM constants
        pamini.s = {
            navHeaderMenu: $('nav#headerMenu > div > ul'),
            children: $('nav#headerMenu .children')
        }

        pamini.menuSuperFish(); //superFish menu plugin for menu UI improvement

        if(Modernizr.borderradius) { //not for IE<9
            pamini.jsPanel(); //mobile menu on left side
            pamini.jRespond(); //nicely working with jsPanel as can smartly check windows size and attach methods according changes
        }
    });

}(jQuery));

/*
     Credits:
     https://github.com/joeldbirch/superfish
     https://github.com/ten1seven/jRespond
     http://jpanelmenu.com/examples/jrespond/index.html
 */
