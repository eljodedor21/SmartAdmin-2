define(['modules/ui/module', 'jquery-ui'], function (module) {

    'use strict';

    module.registerDirective('smartJquiAutocomplete', function () {
        return {
            restrict: 'A',
            scope: {
                'source': '='
            },
            link: function (scope, element, attributes) {

                element.autocomplete({
                    source: scope.source
                });
            }
        }
    });
});
