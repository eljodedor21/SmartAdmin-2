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

    return module.registerDirective('flotSalesChart', function(){
        return {
            restrict: 'E',
            replace: true,
            template: '<div class="chart"></div>',
            scope: {
                data: '='
            },
            link: function(scope, element){

                $.plot(element, [scope.data], {
                    xaxis : {
                        mode : "time",
                        tickLength : 5
                    },
                    series : {
                        lines : {
                            show : true,
                            lineWidth : 1,
                            fill : true,
                            fillColor : {
                                colors : [{
                                    opacity : 0.1
                                }, {
                                    opacity : 0.15
                                }]
                            }
                        },
                        //points: { show: true },
                        shadowSize : 0
                    },
                    selection : {
                        mode : "x"
                    },
                    grid : {
                        hoverable : true,
                        clickable : true,
                        tickColor : config.chartBorderColor,
                        borderWidth : 0,
                        borderColor : config.chartBorderColor
                    },
                    tooltip : true,
                    tooltipOpts : {
                        content : "Your sales for <b>%x</b> was <span>$%y</span>",
                        dateFormat : "%y-%0m-%0d",
                        defaultTheme : false
                    },
                    colors : [config.chartSecond]

                });

            }
        }
    })
});
