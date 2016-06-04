define(['components/inbox/module'], function(module){

    "use strict";

    return module.factory('InboxConfig', function($http){
        return $http.get('api/inbox.json');
    })


});
