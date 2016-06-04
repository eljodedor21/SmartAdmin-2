define(['angular',
    'angular-couch-potato',
    'angular-ui-router'
], function (ng, couchPotato) {

    "use strict";

    var module = ng.module('app.graphs', [
        'ui.router'
    ]);

    couchPotato.configureApp(module);

    module.config(function ($stateProvider, $couchPotatoProvider) {
        $stateProvider
            .state('app.graphs', {
                abstract: true,
                data: {
                    title: 'Graphs'
                }
            })

            .state('app.graphs.flot', {
                url: '/graphs/flot',
                data: {
                    title: 'Flot Charts'
                },
                views: {
                    "content@app": {
                        controller: 'FlotCtrl',
                        templateUrl: "app/modules/graphs/views/flot-charts.html",
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/controllers/FlotCtrl',
                                'modules/graphs/directives/flot/flotBarChart',
                                'modules/graphs/directives/flot/flotSinChart',
                                'modules/graphs/directives/flot/flotHorizontalBarChart',
                                'modules/graphs/directives/flot/flotSalesChart',
                                'modules/graphs/directives/flot/flotFillChart',
                                'modules/graphs/directives/flot/flotPieChart',
                                'modules/graphs/directives/flot/flotSiteStatsChart',
                                'modules/graphs/directives/flot/flotAutoUpdatingChart'
                            ])
                        }
                    }
                }
            })

            .state('app.graphs.morris', {
                url: '/graphs/morris',
                data: {
                    title: 'Morris Charts'
                },
                views: {
                    "content@app": {
                        templateUrl: "app/modules/graphs/views/morris-charts.html",
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/morris/morrisSalesGraph',
                                'modules/graphs/directives/morris/morrisAreaGraph',
                                'modules/graphs/directives/morris/morrisBarGraph',
                                'modules/graphs/directives/morris/morrisNormalBarGraph',
                                'modules/graphs/directives/morris/morrisStackedBarGraph',
                                'modules/graphs/directives/morris/morrisYearGraph',
                                'modules/graphs/directives/morris/morrisDonutGraph',
                                'modules/graphs/directives/morris/morrisTimeGraph',
                                'modules/graphs/directives/morris/morrisLineGraphA',
                                'modules/graphs/directives/morris/morrisLineGraphB',
                                'modules/graphs/directives/morris/morrisLineGraphC',
                                'modules/graphs/directives/morris/morrisNoGridGraph'
                            ])
                        }
                    }
                }
            })

            .state('app.graphs.inline', {
                url: '/graphs/inline',
                data: {
                    title: 'Inline Charts'
                },
                views: {
                    "content@app": {
                        templateUrl: "app/modules/graphs/views/inline-charts.html",
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/inline/sparklineContainer',
                                'modules/graphs/directives/inline/easyPieChartContainer'
                            ])
                        }
                    }
                }
            })

            .state('app.graphs.dygraphs', {
                url: '/graphs/dygraphs',
                data: {
                    title: 'Dygraphs Charts'
                },
                views: {
                    "content@app": {
                        templateUrl: "app/modules/graphs/views/dygraphs-charts.html",
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/dygraphs/dygraphsNoRollPeriod',
                                'modules/graphs/directives/dygraphs/dygraphsNoRollTimestamp'
                            ])
                        }
                    }
                }
            })

            .state('app.graphs.chartjs', {
                url: '/graphs/chartjs',
                data: {
                    title: 'Chartjs'
                },
                views: {
                    "content@app": {
                        templateUrl: "app/modules/graphs/views/chartjs-charts.html",
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/chartjs/chartjsLineChart',
                                'modules/graphs/directives/chartjs/chartjsBarChart',
                                'modules/graphs/directives/chartjs/chartjsPolarChart',
                                'modules/graphs/directives/chartjs/chartjsDoughnutChart',
                                'modules/graphs/directives/chartjs/chartjsRadarChart',
                                'modules/graphs/directives/chartjs/chartjsPieChart'
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