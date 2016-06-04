define(['modules/forms/module', 'modules/forms/common', 'jquery-maskedinput', 'jquery-form', 'jquery-validation'], function (module, formsCommon) {

    'use strict';

    return module.registerDirective('smartContactsForm', function () {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: 'app/modules/forms/directives/form-layouts/smart-contacts-form.tpl.html',
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
                        message : {
                            required : true,
                            minlength : 10
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
                        message : {
                            required : 'Please enter your message'
                        }
                    },

                    // Ajax form submition
                    submitHandler : function() {
                        form.ajaxSubmit({
                            success : function() {
                                form.addClass('submited');
                            }
                        });
                    }
                }, formsCommon.validateOptions));

            }
        }
    });
});
