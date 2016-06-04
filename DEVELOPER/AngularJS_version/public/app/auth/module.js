define([
    'angular',
    'angular-couch-potato',
    'angular-ui-router',
    'angular-google-plus',
    'angular-easyfb'
], function (ng, couchPotato) {

    "use strict";

    var module = ng.module('app.auth', [
        'ui.router'
//        ,
//        'ezfb',
//        'googleplus'
    ]);

    couchPotato.configureApp(module);

    var authKeys = {
        googleClientId: '678402726462-ah1p6ug0klf9jm8cplefmphfupg3bg2h.apps.googleusercontent.com',
        facebookAppId: '620275558085318'
    };

    module.config(function ($stateProvider, $couchPotatoProvider
//        , ezfbProvider
//        , GooglePlusProvider
        ) {
//        GooglePlusProvider.init({
//            clientId: authKeys.googleClientId
//        });
//
//        ezfbProvider.setInitParams({
//            appId: authKeys.facebookAppId
//        });
        $stateProvider.state('realLogin', {
            url: '/real-login',

            views: {
                root: {
                    templateUrl: "app/auth/login/login.html",
                    controller: 'LoginCtrl',
                    resolve: {
                        deps: $couchPotatoProvider.resolveDependencies([
                            'auth/models/User',
                            'auth/directives/loginInfo',

                            'auth/login/LoginCtrl',
                            'auth/login/directives/facebookSignin',
                            'auth/login/directives/googleSignin'
                        ])
                    }
                }
            },
            data: {
                title: 'Login',
                rootId: 'extra-page'
            }

        })

        .state('login', {
            url: '/login',
            views: {
                root: {
                    templateUrl: 'app/auth/views/login.html'
                }
            },
            data: {
                title: 'Login',
                htmlId: 'extr-page'
            },
            resolve: {
                deps: $couchPotatoProvider.resolveDependencies([
                    'modules/forms/directives/validate/smartValidateForm'
                ])
            }
        })

        .state('register', {
            url: '/register',
            views: {
                root: {
                    templateUrl: 'app/auth/views/register.html'
                }
            },
            data: {
                title: 'Register',
                htmlId: 'extr-page'
            },
            resolve: {
                deps: $couchPotatoProvider.resolveDependencies([
                    'modules/forms/directives/validate/smartValidateForm'
                ])
            }
        })

        .state('forgotPassword', {
            url: '/forgot-password',
            views: {
                root: {
                    templateUrl: 'app/auth/views/forgot-password.html'
                }
            },
            data: {
                title: 'Forgot Password',
                htmlId: 'extr-page'
            },
            resolve: {
                deps: $couchPotatoProvider.resolveDependencies([
                    'modules/forms/directives/validate/smartValidateForm'
                ])
            }
        })

        .state('lock', {
            url: '/lock',
            views: {
                root: {
                    templateUrl: 'app/auth/views/lock.html'
                }
            },
            data: {
                title: 'Locked Screen',
                htmlId: 'lock-page'
            }
        })


    }).constant('authKeys', authKeys);

    module.run(function($couchPotato){
        module.lazy = $couchPotato;
    });
    return module;
});