define(['app', 'lodash', 'jquery-ui'], function (module, _) {

    "use strict";

     module.directive('todoList', function ($timeout, Todo) {

        return {
            restrict: 'E',
            replace: true,
            templateUrl: 'app/components/todo/directives/todo-list.tpl.html',
            scope: {
                title: '@',
                icon: '@',
                state: '@'

            },
            controller: function ($scope) {
                $scope.updateTodoState = $scope.$parent.updateTodoState
                $scope.toggleCompleted = $scope.$parent.toggleCompleted
                $scope.deleteTodo = $scope.$parent.deleteTodo
                $scope.$parent.todos.$promise.then(function(todos){
                    $scope.todos = todos;
                });

                $scope.filter = {
                    state: $scope.state
                }
            },

            link: function (scope, element) {


                    element.find('.todo').sortable({
                        handle: '.handle',
                        connectWith: ".todo",
                        receive: function (event, ui) {
                            var todo = ui.item.scope().todo;
                            var state = ui.item.closest('[state]').attr('state')
                            if (todo && state) {
                                scope.updateTodoState(todo, state)
                            } else {
                                console.log('Wat', todo, state);
                            }
                            ui.sender.sortable("cancel");
                        }
                    }).disableSelection();

            }
        }
    })
});
