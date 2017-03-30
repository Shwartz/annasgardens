/**
 * Created with JetBrains PhpStorm.
 * User: Andris
 * Date: 8/8/13
 * Time: 7:07 AM
 * To change this template use File | Settings | File Templates.
 */

(function ($) {

    var cpicker = {};
    var key = '';


    $(document).ready(function () {
        //variables
        cpicker.formID = $('#landingOptions');
        cpicker.submitBtnID = $('#submitColors');
        cpicker.lightColorThemeID = $('#lightColorTheme');
        cpicker.darkColorThemeID = $('#darkColorTheme');
        cpicker.coloredThemeID = $('#coloredTheme');
        cpicker.arr = [];

        //all available color values
        cpicker.inputFieldsIDs = {
            pageBackground: '#pageBackground',
            panelBackground: '#panelBackground',
            textColor: '#textColor',
            postTitle: '#postTitle',
            postTitleHover: '#postTitleHover',
            postLink: '#postLink',
            postLinkHover: '#postLinkHover',
            menuLightColor: '#menuLightColor',
            menuDarkColor: '#menuDarkColor',
            footerBackground: '#footerBackground',
            mediaColor: '#mediaColor',
            mediaColorHover: '#mediaColorHover',
            footerTextColor: '#footerTextColor',
            footerLinkColor: '#footerLinkColor',
            footerLinkColorHover: '#footerLinkColorHover'
        };

        //creating arr for color picker: http://www.eyecon.ro/colorpicker/
        for( key in cpicker.inputFieldsIDs) {
            cpicker.arr.push(cpicker.inputFieldsIDs[key]);
        };

        $(cpicker.arr.join()).ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                var colorVal = '#' + hex;
                $(el).val(colorVal);
                $(el).ColorPickerHide();
                $(el).parent('td').css('background', colorVal);
            },
            onBeforeShow: function () {
                $(this).ColorPickerSetColor(this.value);
            }
        }).bind('keyup', function () { $(this).ColorPickerSetColor(this.value); });

        //predefined Themes (light, dark, colourful)
        cpicker.lightTheme = function () {
            $(cpicker.inputFieldsIDs.pageBackground).val('#dedede');
            $(cpicker.inputFieldsIDs.panelBackground).val('#ffffff');
            $(cpicker.inputFieldsIDs.textColor).val('#1F3145');
            $(cpicker.inputFieldsIDs.postTitle).val('#577691');
            $(cpicker.inputFieldsIDs.postTitleHover).val('#374857');
            $(cpicker.inputFieldsIDs.postLink).val('#577691');
            $(cpicker.inputFieldsIDs.postLinkHover).val('#374857');
            $(cpicker.inputFieldsIDs.menuLightColor).val('#455867');
            $(cpicker.inputFieldsIDs.menuDarkColor).val('#304050');
            $(cpicker.inputFieldsIDs.footerBackground).val('#383838');
            $(cpicker.inputFieldsIDs.mediaColor).val('#fcfcfc');
            $(cpicker.inputFieldsIDs.mediaColorHover).val('#949494');
            $(cpicker.inputFieldsIDs.footerTextColor).val('#b8b8b8');
            $(cpicker.inputFieldsIDs.footerLinkColor).val('#93b5cc');
            $(cpicker.inputFieldsIDs.footerLinkColorHover).val('#6d808c');

            cpicker.formID.submit();
        };

        cpicker.darkTheme = function () {
            $(cpicker.inputFieldsIDs.pageBackground).val('#2e232e');
            $(cpicker.inputFieldsIDs.panelBackground).val('#3d4142');
            $(cpicker.inputFieldsIDs.textColor).val('#c9c9c9');
            $(cpicker.inputFieldsIDs.postTitle).val('#a897a8');
            $(cpicker.inputFieldsIDs.postTitleHover).val('#ffd4ff');
            $(cpicker.inputFieldsIDs.postLink).val('#97b2c9');
            $(cpicker.inputFieldsIDs.postLinkHover).val('#d1eaff');
            $(cpicker.inputFieldsIDs.menuLightColor).val('#455867');
            $(cpicker.inputFieldsIDs.menuDarkColor).val('#304050');
            $(cpicker.inputFieldsIDs.footerBackground).val('#0d0b0d');
            $(cpicker.inputFieldsIDs.mediaColor).val('#fcfcfc');
            $(cpicker.inputFieldsIDs.mediaColorHover).val('#949494');
            $(cpicker.inputFieldsIDs.footerTextColor).val('#b8b8b8');
            $(cpicker.inputFieldsIDs.footerLinkColor).val('#93b5cc');
            $(cpicker.inputFieldsIDs.footerLinkColorHover).val('#6d808c');

            cpicker.formID.submit();
        };

        cpicker.coloredTheme = function () {
            $(cpicker.inputFieldsIDs.pageBackground).val('#ffcb2e');
            $(cpicker.inputFieldsIDs.panelBackground).val('#fff0c4');
            $(cpicker.inputFieldsIDs.textColor).val('#5c5c5b');
            $(cpicker.inputFieldsIDs.postTitle).val('#c2524a');
            $(cpicker.inputFieldsIDs.postTitleHover).val('#85c24b');
            $(cpicker.inputFieldsIDs.postLink).val('#5bcc10');
            $(cpicker.inputFieldsIDs.postLinkHover).val('#3c731c');
            $(cpicker.inputFieldsIDs.menuLightColor).val('#455867');
            $(cpicker.inputFieldsIDs.menuDarkColor).val('#304050');
            $(cpicker.inputFieldsIDs.footerBackground).val('#283447');
            $(cpicker.inputFieldsIDs.mediaColor).val('#fcfcfc');
            $(cpicker.inputFieldsIDs.mediaColorHover).val('#22aed1');
            $(cpicker.inputFieldsIDs.footerTextColor).val('#b8b8b8');
            $(cpicker.inputFieldsIDs.footerLinkColor).val('#93b5cc');
            $(cpicker.inputFieldsIDs.footerLinkColorHover).val('#6d808c');

            cpicker.formID.submit();
        };

        //Change color and save new Theme
        cpicker.lightColorThemeID.click(function () {
            cpicker.lightTheme();
            return false;
        });

        cpicker.darkColorThemeID.click(function () {
            cpicker.darkTheme();
            return false;
        });

        cpicker.coloredThemeID.click(function () {
            cpicker.coloredTheme();
            return false;
        });

    });


})(jQuery);