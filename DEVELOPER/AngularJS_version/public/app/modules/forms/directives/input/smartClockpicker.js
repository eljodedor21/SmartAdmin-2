define(['modules/forms/module', 'clockpicker'], function (module) {

    'use strict';

    return module.registerDirective('smartClockpicker', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-clockpicker data-smart-clockpicker');

                var options = {
                    placement: 'top',
                    donetext: 'Done'
                }

                tElement.clockpicker(options);
            }
        }
    });
});
