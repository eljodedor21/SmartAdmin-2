define(['modules/ui/module', 'jquery-ui'], function (module) {

    'use strict';

    module.registerDirective('smartJquiTabs', function () {
        return {
            restrict: 'A',
            link: function (scope, element, attributes) {

                element.tabs();
            }
        }
    });
});
