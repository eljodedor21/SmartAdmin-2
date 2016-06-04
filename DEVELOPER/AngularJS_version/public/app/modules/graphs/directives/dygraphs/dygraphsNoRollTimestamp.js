define(['modules/graphs/module', 'dygraphs-demo', 'dygraphs'], function (module, demo) {

    'use strict';

    return module.registerDirective('dygraphsNoRollTimestamp', function () {
        return {
            restrict: 'A',
            compile: function () {
                return {
                    post: function (scope, element) {
                        new Dygraph(element[0], demo.data_temp, {
                            rollPeriod : 14,
                            showRoller : true,
                            customBars : true,
                            ylabel : 'Temperature (F)',
                            legend : 'always',
                            labelsDivStyles : {
                                'textAlign' : 'right'
                            },
                            showRangeSelector : true,
                            rangeSelectorHeight : 30,
                            rangeSelectorPlotStrokeColor : 'yellow',
                            rangeSelectorPlotFillColor : 'lightyellow'
                        });
                    }
                }
            }
        }
    });
});
