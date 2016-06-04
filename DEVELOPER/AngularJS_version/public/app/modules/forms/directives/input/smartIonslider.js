define(['modules/forms/module', 'ionslider'], function (module) {

    'use strict';

    return module.registerDirective('smartIonslider', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-ionslider data-smart-ionslider');

                tElement.ionRangeSlider();
            }
        }
    });
});
