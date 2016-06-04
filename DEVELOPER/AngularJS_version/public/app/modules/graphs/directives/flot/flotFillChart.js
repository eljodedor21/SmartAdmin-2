define(['modules/graphs/module', 'modules/graphs/directives/flot/FlotConfig',
    'flot',
    'flot-resize',
    'flot-fillbetween',
    'flot-orderBar',
    'flot-pie',
    'flot-time',
    'flot-tooltip'
], function(module, config){
    "use strict";

    return module.registerDirective('flotFillChart', function(){
        return {
            restrict: 'E',
            replace: true,
            template: '<div class="chart"></div>',
            scope: {
                data: '='
            },
            link: function(scope, element){

                $.plot(element, scope.data, {

                    xaxis : {
                        tickDecimals : 0
                    },

                    yaxis : {
                        tickFormatter : function(v) {
                            return v + " cm";
                        }
                    }

                });
            }
        }
    })
});
