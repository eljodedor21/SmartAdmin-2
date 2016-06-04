define(['modules/graphs/module', 'modules/graphs/directives/flot/FlotConfig',
    'flot',
    'flot-resize',
    'flot-fillbetween',
    'flot-orderBar',
    'flot-pie',
    'flot-time',
    'flot-tooltip'
], function (module, config) {
    "use strict";

    return module.registerDirective('flotSinChart', function () {
        return {
            restrict: 'E',
            replace: true,
            template: '<div class="chart"></div>',
            scope: {
                data: '='
            },
            link: function (scope, element) {

                var plot = $.plot(element, scope.data, {
                    series: {
                        lines: {
                            show: true
                        },
                        points: {
                            show: true
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: config.chartBorderColor,
                        borderWidth: 0,
                        borderColor: config.chartBorderColor
                    },
                    tooltip: true,
                    tooltipOpts: {
                        //content : "Value <b>$x</b> Value <span>$y</span>",
                        defaultTheme: false
                    },
                    colors: [config.chartSecond, config.chartFourth],
                    yaxis: {
                        min: -1.1,
                        max: 1.1
                    },
                    xaxis: {
                        min: 0,
                        max: 15
                    }
                });

                element.on("plotclick", function (event, pos, item) {
                    if (item) {
                        $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
                        plot.highlight(item.series, item.datapoint);
                    }
                });
            }
        }
    })
});
