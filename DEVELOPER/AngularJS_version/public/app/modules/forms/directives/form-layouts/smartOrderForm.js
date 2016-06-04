define(['modules/forms/module', 'modules/forms/common', 'jquery-maskedinput', 'jquery-validation'], function (module, formsCommon) {

    'use strict';

    return module.registerDirective('smartOrderForm', function () {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: 'app/modules/forms/directives/form-layouts/smart-order-form.tpl.html',
            scope: true,
            link: function (scope, form) {

                form.validate(angular.extend({
                    // Rules for form validation
                    rules : {
                        name : {
                            required : true
                        },
                        email : {
                            required : true,
                            email : true
                        },
                        phone : {
                            required : true
                        },
                        interested : {
                            required : true
                        },
                        budget : {
                            required : true
                        }
                    },

                    // Messages for form validation
                    messages : {
                        name : {
                            required : 'Please enter your name'
                        },
                        email : {
                            required : 'Please enter your email address',
                            email : 'Please enter a VALID email address'
                        },
                        phone : {
                            required : 'Please enter your phone number'
                        },
                        interested : {
                            required : 'Please select interested service'
                        },
                        budget : {
                            required : 'Please select your budget'
                        }
                    },

                }, formsCommon.validateOptions));

            }
        }
    });
});
