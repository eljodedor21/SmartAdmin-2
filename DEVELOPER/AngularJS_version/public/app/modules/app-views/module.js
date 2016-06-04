define(['angular',
    'angular-couch-potato',
    'angular-ui-router'], function (ng, couchPotato) {

    "use strict";


    var module = ng.module('app.appViews', ['ui.router']);


    couchPotato.configureApp(module);

    module.config(function ($stateProvider, $couchPotatoProvider) {

        $stateProvider
            .state('app.appViews', {
                abstract: true,
                data: {
                    title: 'App views'
                }
            })

            .state('app.appViews.projects', {
                url: '/projects',
                data: {
                    title: 'Projects'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/project-list.html',
                        controller: 'ProjectsDemoCtrl',
                        resolve: {
                            projects: function($http){
                                return $http.get('api/project-list.json')
                            },
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/inline/sparklineContainer',
                                'modules/app-views/controllers/ProjectsDemoCtrl',
                                'modules/tables/directives/datatables/datatableBasic'
                            ])
                        }
                    }
                }
            })

            .state('app.appViews.blogDemo', {
                url: '/blog',
                data: {
                    title: 'Blog'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/blog-demo.html'
                    }
                }
            })

            .state('app.appViews.galleryDemo', {
                url: '/gallery',
                data: {
                    title: 'Gallery'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/gallery-demo.html',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/ui/directives/smartSuperBox'
                            ])
                        }
                    }
                }
            })

            .state('app.appViews.forumDemo', {
                url: '/forum',
                data: {
                    title: 'Forum'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/forum-demo.html'
                    }
                }
            })

            .state('app.appViews.forumTopicDemo', {
                url: '/forum-topic',
                data: {
                    title: 'Forum Topic'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/forum-topic-demo.html'
                    }
                }
            })

            .state('app.appViews.forumPostDemo', {
                url: '/forum-post',
                data: {
                    title: 'Forum Post'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/forum-post-demo.html',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/inline/sparklineContainer',
                                'modules/graphs/directives/inline/easyPieChartContainer',
                                'modules/forms/directives/editors/smartSummernoteEditor'
                            ])
                        }
                    }
                }
            })


            .state('app.appViews.profileDemo', {
                url: '/profile',
                data: {
                    title: 'Profile'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/profile-demo.html'
                    }
                }
            })


            .state('app.appViews.timelineDemo', {
                url: '/timeline',
                data: {
                    title: 'Timeline'
                },
                views: {
                    "content@app": {
                        templateUrl: 'app/modules/app-views/views/timeline-demo.html',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/graphs/directives/inline/sparklineContainer',
                                'modules/graphs/directives/inline/easyPieChartContainer'
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
