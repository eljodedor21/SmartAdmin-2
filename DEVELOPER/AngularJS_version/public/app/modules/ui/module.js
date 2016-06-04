define(['angular',
    'angular-couch-potato',
    'angular-ui-router'], function(ng, couchPotato){

    var module = angular.module('app.ui', ['ui.router']);

    couchPotato.configureApp(module);

    module.config(function($stateProvider, $couchPotatoProvider){

        $stateProvider
            .state('app.ui', {
                abstract: true,
                data: {
                    title: 'UI Elements'
                }
            })
            .state('app.ui.general', {
                url: '/ui/general',
                data: {
                    title: 'General Elements'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/general-elements.html',
                        controller: 'GeneralElementsCtrl',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/controllers/GeneralElementsCtrl',
                                'modules/ui/directives/smartHtmlPopover',
                                'modules/ui/directives/smartProgressbar',
                                'modules/ui/directives/smartRideCarousel'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.buttons', {
                url: '/ui/buttons',
                data: {
                    title: 'Buttons'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/buttons.html',
                        controller: 'GeneralElementsCtrl',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/controllers/GeneralElementsCtrl',
                                'modules/ui/directives/smartHtmlPopover',
                                'modules/ui/directives/smartProgressbar',
                                'modules/ui/directives/smartRideCarousel'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.iconsFa', {
                url: '/ui/icons-font-awesome',
                data: {
                    title: 'Font Awesome'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/icons-fa.html',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/directives/smartClassFilter'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.iconsGlyph', {
                url: '/ui/icons-glyph',
                data: {
                    title: 'Glyph Icons'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/icons-glyph.html',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/directives/smartClassFilter'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.iconsFlags', {
                url: '/ui/icons-flags',
                data: {
                    title: 'Flags'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/icons-flags.html',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/directives/smartClassFilter'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.grid', {
                url: '/ui/grid',
                data: {
                    title: 'Grid'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/grid.html'
                    }
                }
            })
            .state('app.ui.treeView', {
                url: '/ui/tree-view',
                data: {
                    title: 'Tree View'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/tree-view.html',
                        controller: 'TreeviewCtrl',
                        resolve:{
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/controllers/TreeviewCtrl',
                                'modules/ui/directives/smartTreeview'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.nestableLists', {
                url: '/ui/nestable-lists',
                data: {
                    title: 'Nestable Lists'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/nestable-lists.html',
                        resolve:{
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/inline/easyPieChartContainer',
                                'modules/ui/directives/smartNestable'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.jqueryUi', {
                url: '/ui/jquery-ui',
                data: {
                    title: 'JQuery UI'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/jquery-ui.html',
                        controller: 'JquiCtrl',
                        resolve:{
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/controllers/JquiCtrl',
                                'modules/forms/directives/input/smartUislider',
                                'modules/forms/directives/input/smartSpinner',
                                'modules/ui/directives/smartJquiDialog',
                                'modules/ui/directives/smartJquiDialogLauncher',
                                'modules/ui/directives/smartProgressbar',
                                'modules/ui/directives/smartJquiAccordion',
                                'modules/ui/directives/smartJquiAutocomplete',
                                'modules/ui/directives/smartJquiAjaxAutocomplete',
                                'modules/ui/directives/smartJquiMenu',
                                'modules/ui/directives/smartJquiTabs',
                                'modules/ui/directives/smartJquiDynamicTabs'
                            ])
                        }
                    }
                }
            })
            .state('app.ui.typography', {
                url: '/ui/typography',
                data: {
                    title: 'JQuery UI'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/ui/views/typography.html'
                    }
                }
            })
    });

    module.run(function($couchPotato){
        module.lazy = $couchPotato
    });

    return module;
});