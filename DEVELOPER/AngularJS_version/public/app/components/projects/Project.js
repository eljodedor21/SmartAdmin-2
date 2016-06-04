define(['app'], function(app){
    "use strict";

    return app.factory('Project', function($http){
        return {
            list: $http.get('api/projects.json')
        }
    })
})
