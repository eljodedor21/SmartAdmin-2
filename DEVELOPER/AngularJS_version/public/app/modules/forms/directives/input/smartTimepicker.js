define(['modules/forms/module', 'bootstrap-timepicker'], function (module) {

    'use strict';

    return module.registerDirective('smartTimepicker', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-timepicker data-smart-timepicker');
                tElement.timepicker();
            }
        }
    });
});
