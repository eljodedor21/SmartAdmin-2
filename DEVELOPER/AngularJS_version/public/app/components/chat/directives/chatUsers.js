define(['components/chat/module'], function(module){

    "use strict";

    module.registerDirective('chatUsers', function(ChatApi){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: 'app/components/chat/directives/chat-users.tpl.html',
            scope: true,
            link: function(scope, element){
                scope.open = false;
                scope.openToggle = function(){
                    scope.open = !scope.open;
                };

                scope.chatUserFilter = '';

                ChatApi.initialized.then(function () {
                    scope.chatUsers = ChatApi.users;
                });
            }
        }
    });
});
