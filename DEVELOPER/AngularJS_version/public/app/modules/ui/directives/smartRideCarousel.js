define(['modules/ui/module', 'bootstrap'], function (module) {

    'use strict';

    return module.registerDirective('smartRideCarousel', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-ride-carousel data-smart-ride-carousel');
                tElement.carousel(tElement.data());
            }
        }
    });
});
