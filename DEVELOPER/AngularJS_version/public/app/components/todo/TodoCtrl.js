define(['app'], function (module) {

    "use strict";

    module.registerController('TodoCtrl', /* @ngInject */ function ($scope, $timeout, Todo) {
        $scope.newTodo = undefined;

        $scope.states = ['Critical', 'Important', 'Completed'];

        $scope.todos = Todo.query({});


        $scope.toggleCompleted = function (todo) {
            if (!todo.completedAt) {
                todo.state = 'Completed';
                todo.completedAt = new Date();
            } else {
                todo.state = 'Critical';
                todo.completedAt = null;
            }

            todo.$update();
        };


        $scope.updateTodoState = function (todo, state) {

            todo.state = state;
            if (state == 'Completed') {
                todo.completedAt = JSON.stringify(new Date());
            } else {
                todo.completedAt = null;
            }

            todo.$update();
        };

        $scope.toggleAdd = function () {
            if (!$scope.newTodo) {
                $scope.newTodo = new Todo({
                    state: 'Important'
                });
            } else {
                $scope.newTodo = undefined;
            }
        };

        $scope.createTodo = function () {
            $scope.newTodo.$save(function (respoonse) {
                $scope.todos.push(respoonse);
                $scope.newTodo = undefined;
            });
        };

        $scope.deleteTodo = function (todo) {
            todo.$delete(function () {
                $scope.todos.splice($scope.todos.indexOf(todo), 1);
            });
        };

    });

});
