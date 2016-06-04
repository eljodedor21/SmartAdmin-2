define(['modules/forms/module', 'lodash', 'bootstrap-colorpicker'], function (module, _) {

    'use strict';

    return module.registerDirective('smartColorpicker', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-colorpicker data-smart-colorpicker');


                var aOptions = _.pick(tAttributes, ['']);

                var options = _.extend(aOptions, {});

                tElement.colorpicker(options);
            }
        }
    });
});
