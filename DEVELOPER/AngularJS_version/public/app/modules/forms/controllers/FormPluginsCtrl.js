define(['modules/forms/module'], function(module){
    "use strict";

    return module.registerController('FormPluginsCtrl', function($scope, $log){

    	$scope.editableOptions =  {
    		mode: 'popup',
    		disabled: false
    	};

    	$scope.toggleInline = function() {
    		if($scope.editableOptions.mode == 'popup') {
    			$scope.editableOptions.mode = 'inline';
    		}
    		else {
    			$scope.editableOptions.mode = 'popup'
    		}
    	};

    	$scope.toggleDisabled = function() {
    		$scope.editableOptions.disabled = !$scope.editableOptions.disabled;
    	};

    })

});