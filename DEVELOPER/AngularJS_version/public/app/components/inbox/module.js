define([
    'angular',
    'angular-couch-potato',
    'lodash',
    'angular-ui-router',
    'angular-resource'

], function (ng, couchPotato, _) {
    'use strict';

    var module = ng.module('app.inbox', [
        'ui.router',
        'ngResource'
    ]);

    couchPotato.configureApp(module);

    module.config(function ($stateProvider, $couchPotatoProvider) {

        $stateProvider
            .state('app.inbox', {
                url: '/inbox',
                data: {
                    title: 'Inbox'
                },
                views: {
                    content: {
                        templateUrl: 'app/components/inbox/views/inbox-layout.html',
                        controller: function ($scope, config) {
                            $scope.config = config.data;
                            $scope.deleteSelected = function(){
                                $scope.$broadcast('$inboxDeleteMessages')
                            }
                        },
                        controllerAs: 'inboxCtrl',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'components/inbox/directives/messageLabels'
                            ]),
                            config: function (InboxConfig) {
                                return InboxConfig;
                            }
                        }
                    }
                }

            })
            .state('app.inbox.folder', {
                url: '/:folder',
                views: {
                    inbox: {
                        templateUrl: 'app/components/inbox/views/inbox-folder.html',
                        controller: function ($scope, messages, $stateParams) {
                            $scope.$parent.selectedFolder = _.find($scope.$parent.config.folders, {key: $stateParams.folder});
                            $scope.messages = messages;

                            $scope.$on('$inboxDeleteMessages', function(event){
                                angular.forEach($scope.messages, function(message, idx){
                                    if(message.selected){
                                        message.$delete(function(){
                                            $scope.messages.splice(idx, 1);
                                        })
                                    }
                                });
                            });

                        },
                        resolve: {
                            messages: function (InboxMessage, $stateParams) {
                                return InboxMessage.query({folder: $stateParams.folder});
                            }
                        }
                    }
                }
            })
            .state('app.inbox.folder.detail', {
                url: '/detail/:message',
                views: {
                    "inbox@app.inbox": {
                        templateUrl: 'app/components/inbox/views/inbox-detail.html',
                        controller: function ($scope, message) {
                            $scope.message = message;
                        },
                        resolve: {
                            message: function (InboxMessage, $stateParams) {
                                return InboxMessage.get({id: $stateParams.message})
                            }
                        }
                    }
                }
            })
            .state('app.inbox.folder.replay', {
                url: '/replay/:message',
                views: {
                    "inbox@app.inbox": {
                        templateUrl: 'app/components/inbox/views/inbox-replay.html',
                        controller: function ($scope, $timeout, $state, replayTo) {
                            $scope.replayTo = replayTo;
                            $scope.sending = false;
                            $scope.send = function(){
                                $scope.sending = true;
                                $timeout(function(){
                                    $state.go('app.inbox.folder')
                                }, 1000);
                            }
                        },
                        controllerAs: 'replayCtrl',
                        resolve: {
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/forms/directives/input/smartSelect2',
                                'modules/forms/directives/editors/smartSummernoteEditor'
                            ]),
                            replayTo: function (InboxMessage, $stateParams) {
                                return InboxMessage.get({id: $stateParams.message})
                            }
                        }
                    }
                }
            })
            .state('app.inbox.folder.compose', {
                url: '/compose',
                views: {
                    "inbox@app.inbox": {
                        templateUrl: 'app/components/inbox/views/inbox-compose.html',
                        controller: function ($scope, $timeout, $state) {
                            $scope.sending = false;
                            $scope.send = function(){
                                $scope.sending = true;
                                $timeout(function(){
                                    $state.go('app.inbox.folder')
                                }, 1000);
                            }
                        },
                        controllerAs: 'composeCtrl',
                        resolve:{
                            deps: $couchPotatoProvider.resolveDependencies([
                                'modules/forms/directives/input/smartSelect2',
                                'modules/forms/directives/editors/smartSummernoteEditor'
                            ])
                        }
                    }
                }
            });
    });

    module.run(function($couchPotato){
        module.lazy = $couchPotato;
    });

    return module;
});