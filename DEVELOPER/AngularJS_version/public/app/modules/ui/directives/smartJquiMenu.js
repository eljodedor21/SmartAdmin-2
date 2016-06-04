define(['modules/ui/module', 'jquery-ui'], function (module) {

    'use strict';

    module.registerDirective('smartJquiMenu', function () {
        return {
            restrict: 'A',
            link: function (scope, element, attributes) {

                element.menu();
            }
        }
    });
});
