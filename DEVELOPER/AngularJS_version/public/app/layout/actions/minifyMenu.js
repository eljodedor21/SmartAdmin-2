define(['layout/module'], function (module) {
    "use strict";

    module.registerDirective('minifyMenu', function(){
        return {
            restrict: 'A',
            link: function(scope, element){
                    var $body = $('body');
                var minifyMenu = function() {
                    if (!$body.hasClass("menu-on-top")) {
                        $body.toggleClass("minified");
                        $body.removeClass("hidden-menu");
                        $('html').removeClass("hidden-menu-mobile-lock");
                    }
                };

                element.on('click', minifyMenu);
            }
        }
    })

});
