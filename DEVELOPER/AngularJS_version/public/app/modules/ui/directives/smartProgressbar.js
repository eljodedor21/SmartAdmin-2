define(['modules/ui/module', 'bootstrap-progressbar'], function (module) {

    'use strict';

    return module.registerDirective('smartProgressbar', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-progressbar data-smart-progressbar');
                tElement.progressbar({
                    display_text : 'fill'
                });
            }
        }
    });
});
