/* 
 * Licence of Learning Info System (LIS)
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE.txt
 */

/* global define */

/**
 * 
 * @param {type} define
 * @param {type} window
 * @returns {undefined}
 */
(function (define, window) {
    'use strict';

    define([], function () {

        /**
         * 
         * @param {type} $http
         * @param {type} $resource
         * @return {vocationModel_L6.vocationModel.vocationModelAnonym$3}
         */
        function moduleModel($http, $resource) {

            var _model;

            _model = $resource(
                window.LisGlobals.RestUrl + 'module/:id',
                {id: '@id'},
                {
                    update: {method: "PUT"},
                    query: {method: 'GET', isArray: false}
                }
            );

            return {
                /**
                 * 
                 * @param {type} params
                 * @return {unresolved}
                 */
                GetList: function (params) {
                    return _model.query(params).$promise;
                },
                /**
                 * 
                 * @param {type} id
                 * @return {unresolved}
                 */
                Get: function (id) {
                    return _model.get({id: id}).$promise;
                },
                /**
                 * 
                 * @param {type} data
                 * @return {undefined}
                 * @return {unresolved}
                 */
                Create: function (data) {
                    return _model.save(data).$promise;
                },
                /**
                 * 
                 * @param {type} id
                 * @param {type} data
                 * @return {undefined}
                 */
                Update: function (id, data) {
                    return _model.update({ id:id }, data).$promise;
                },
                /**
                 * 
                 * @param {type} id
                 * @return {undefined}
                 * @return {unresolved}
                 */
                Delete: function (id) {
                    //TODO
                }
            };
        }
        
        moduleModel.$inject = ['$http', '$resource'];
        
        return moduleModel;
    });

}(define, window));
