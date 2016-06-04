define(['modules/forms/module', 'select2'], function (module) {

    'use strict';

    module.registerDirective('smartSelect2', function () {
        return {
            restrict: 'A',
            compile: function (element, attributes) {
                element.removeAttr('smart-select2 data-smart-select2');
                element.select2();
            }
        }
    });
});
