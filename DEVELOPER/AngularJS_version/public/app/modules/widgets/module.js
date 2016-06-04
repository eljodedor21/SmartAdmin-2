define(['angular',
    'angular-couch-potato',
    'angular-ui-router'], function (ng, couchPotato) {

    "use strict";


    var module = ng.module('app.widgets', ['ui.router']);


    couchPotato.configureApp(module);

    module.config(function ($stateProvider, $couchPotatoProvider) {

        $stateProvider
            .state('app.widgets', {
                url: '/widgets',
                data: {
                    title: 'Widgets'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/widgets/views/widgets-demo.html'

                    }
                }

            })

    });

    module.run(function ($couchPotato) {
        module.lazy = $couchPotato;
    });

    return module;

});
