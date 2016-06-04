define(['modules/maps/module'], function (module) {

    'use strict';

    module.registerController('MapsDemoCtrl', function ($scope, $http, $q, SmartMapStyle, uiGmapGoogleMapApi, SmartMapInstances) {

        $scope.styles = SmartMapStyle.styles;

        uiGmapGoogleMapApi.then(function (maps) {
            maps.visualRefresh = true;
        });


        $scope.setType = function (key) {
            SmartMapStyle.getMapType(key).then(function(type){
                $scope.mapInstance.mapTypes.set(key, type);
                $scope.mapInstance.setMapTypeId(key);
            });
            $scope.currentType = key;
        };

        SmartMapInstances.getMap('demoMap').then(function(instance){
            $scope.mapInstance = instance
        });


        $scope.map = {
            center: {
                latitude: 23.895883, longitude: -80.650635
            },
            zoom: 5
        };

        $scope.options = {
            scrollwheel: false,
            disableDefaultUI: true
        };

    });
});
