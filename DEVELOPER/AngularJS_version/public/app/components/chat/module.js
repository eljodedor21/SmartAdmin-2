define(['angular',
    'angular-couch-potato',
    'angular-sanitize'
    ], function (ng, couchPotato) {

    "use strict";


    var module = ng.module('app.chat', ['ngSanitize']);


    couchPotato.configureApp(module);


    module.run(function ($couchPotato,$templateCache) {
        module.lazy = $couchPotato;

        $templateCache.put("template/popover/popover.html",
        "<div class=\"popover {{placement}}\" ng-class=\"{ in: isOpen(), fade: animation() }\">\n" +
        "  <div class=\"arrow\"></div>\n" +
        "\n" +
        "  <div class=\"popover-inner\">\n" +
        "      <h3 class=\"popover-title\" ng-bind-html=\"title | unsafe\" ng-show=\"title\"></h3>\n" +
        "      <div class=\"popover-content\"ng-bind-html=\"content | unsafe\"></div>\n" +
        "  </div>\n" +
        "</div>\n" +
        "");

    }).filter('unsafe', ['$sce', function ($sce) {
        return function (val) {
            return $sce.trustAsHtml(val);
        };
    }]);

    return module;

});
