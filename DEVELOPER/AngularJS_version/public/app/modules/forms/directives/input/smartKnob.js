define(['modules/forms/module', 'jquery-knob'], function (module) {

    'use strict';

    return module.registerDirective('smartKnob', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-knob data-smart-knob');

                tElement.knob();
            }
        }
    });
});
