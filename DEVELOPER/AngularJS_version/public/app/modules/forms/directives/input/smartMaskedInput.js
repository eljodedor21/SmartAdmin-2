define(['modules/forms/module', 'jquery-maskedinput'], function (module) {
    "use strict";

    return module.registerDirective('smartMaskedInput', function(){
        return {
            restrict: 'A',
            compile: function(tElement, tAttributes){
                tElement.removeAttr('smart-masked-input data-smart-masked-input');

                var options = {};
                if(tAttributes.maskPlaceholder) options.placeholder =  tAttributes.maskPlaceholder;
                tElement.mask(tAttributes.smartMaskedInput, options);
            }
        }
    })
});