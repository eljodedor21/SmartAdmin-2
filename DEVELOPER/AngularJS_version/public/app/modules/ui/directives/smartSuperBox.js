define(['modules/ui/module', 'superbox'], function (module) {

    'use strict';

    module.registerDirective('smartSuperBox', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {

                tElement.removeAttr('smart-super-box data-smart-super-box');

                tElement.SuperBox();
            }
        }
    });
});
