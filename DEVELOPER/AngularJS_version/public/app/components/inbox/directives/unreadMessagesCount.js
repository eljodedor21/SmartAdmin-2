define(['components/inbox/module', 'lodash'], function(module, _){

    "use strict";

    module.registerDirective('unreadMessagesCount', function(InboxConfig){
        return {
            restrict: 'A',
            link: function(scope, element){
                InboxConfig.success(function(config){
                    element.html(_.find(config.folders, {key: 'inbox'}).unread);
                })
            }
        }
    })
});