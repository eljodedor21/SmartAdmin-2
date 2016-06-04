define(['app'], function(module){
    "use strict";

    module.registerDirective('languageSelector', function(Language){
        return {
            restrict: "EA",
            replace: true,
            templateUrl: "app/components/language/language-selector.tpl.html",
            scope: true,
        }
    })
});
