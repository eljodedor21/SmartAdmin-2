define(['modules/forms/module', 'summernote'], function (module) {

    'use strict';

    module.registerDirective('smartDestroySummernote', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-destroy-summernote data-smart-destroy-summernote')
                tElement.on('click', function() {
                    angular.element(tAttributes.smartDestroySummernote).destroy();
                })
            }
        }
    });
});
