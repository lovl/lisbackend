/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global define */

(function (define) {
    'use strict';

    define([], function () {

        function vocationController($scope, $routeParams, vocationModel) {
            
            $scope.data = {
                id: null,
                name: null,
                vocationCode: null,
                durationEKAP: null,
                trashed: null
            };

            vocationModel
                .Get($routeParams.id)
                .then(
                    function (result) {
                        $scope.vocations = result.data;
                        console.log(result.data);
                    }
                );

        }

        vocationController.$inject = ['$scope', '$routeParams', 'vocationModel'];

        return vocationController;
    });

}(define));


