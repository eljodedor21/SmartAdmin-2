define(['modules/graphs/module', 'morris'], function(module){

    "use strict";

    return module.registerDirective('morrisDonutGraph', function(){
        return {
            restrict: 'E',
            replace: true,
            template: '<div class="chart no-padding"></div>',
            link: function(scope, element){

                Morris.Donut({
                    element : element,
                    data : [{
                        value : 70,
                        label : 'foo'
                    }, {
                        value : 15,
                        label : 'bar'
                    }, {
                        value : 10,
                        label : 'baz'
                    }, {
                        value : 5,
                        label : 'A really really long label'
                    }],
                    formatter : function(x) {
                        return x + "%"
                    }
                });

            }
        }
    })



});
