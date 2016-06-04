define(['app'], function (app) {

    "use strict";

    return app.factory('Todo', function ($resource) {


        return $resource('api/todos.json', {'id': '@_id'});

    });


});
