define(['modules/forms/module', 'dropzone'], function (module) {

    'use strict';

    return module.registerDirective('smartDropzone', function () {
        return {
            restrict: 'A',
            compile: function (tElement, tAttributes) {
                tElement.removeAttr('smart-dropzone data-smart-dropzone');

                tElement.dropzone({
                    addRemoveLinks : true,
                    maxFilesize: 0.5,
                    dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
                    dictResponseError: 'Error uploading file!'
                });
            }
        }
    });
});
