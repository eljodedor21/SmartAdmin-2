define(['angular',
    'angular-couch-potato',
    'angular-ui-router'

], function (ng, couchPotato) {

    "use strict";

    var module = ng.module('app.tables', [ 'ui.router']);

    couchPotato.configureApp(module)

    module.config(function ($stateProvider, $couchPotatoProvider) {

        $stateProvider
            .state('app.tables', {
                abstract: true,
                data: {
                    title: 'Tables'
                }
            })

            .state('app.tables.normal', {
                url: '/tables/normal',
                data: {
                    title: 'Normal Tables'
                },
                views: {
                    "content@app": {
                        templateUrl: "app/modules/tables/views/normal.html"

                    }
                }
            })

            .state('app.tables.datatables', {
                url: '/tables/datatables',
                data: {
                    title: 'Data Tables'
                },
                views: {
                    "content@app": {
                        templateUrl: "app/modules/tables/views/datatables.html",
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/tables/directives/datatables/datatableBasic',
                                'modules/tables/directives/datatables/datatableColumnFilter',
                                'modules/tables/directives/datatables/datatableColumnReorder',
                                'modules/tables/directives/datatables/datatableTableTools'
                            ])
                        }
                    }
                }
            })

            .state('app.tables.jqgrid', {
                url: '/tables/jqgrid',
                data: {
                    title: 'Jquery Grid'
                },
                views: {
                    "content@app": {
                        controller: 'JqGridCtrl',
                        templateUrl: "app/modules/tables/views/jqgrid.html",
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/tables/controllers/JqGridCtrl',
                                'modules/tables/directives/jqgrid/jqGrid'
                            ])
                        }
                    }
                }
            })
    });


    module.run(function ($couchPotato) {
        module.lazy = $couchPotato;
    });
    return module;

});
