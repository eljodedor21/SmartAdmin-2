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

    return module.registerDirective('flotHorizontalBarChart', function(){
        return {
            restrict: 'E',
            replace: true,
            template: '<div class="chart"></div>',
            scope: {
                data: '='
            },
            link: function(scope, element){
                $.plot(element, scope.data, {
                    colors : [config.chartSecond, config.chartFourth, "#666", "#BBB"],
                    grid : {
                        show : true,
                        hoverable : true,
                        clickable : true,
                        tickColor : config.chartBorderColor,
                        borderWidth : 0,
                        borderColor : config.chartBorderColor
                    },
                    legend : true,
                    tooltip : true,
                    tooltipOpts : {
                        content : "<b>%x</b> = <span>%y</span>",
                        defaultTheme : false
                    }
                });
            }
        }
    })
});
