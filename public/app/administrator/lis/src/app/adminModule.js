/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global define */

/**
 * 
 * @param {type} define
 * @returns {undefined}
 */
(function (define) {
    'use strict';

    /**
     * 
     * @param {type} angular
     * @param {type} config
     * @param {type} vocationModel
     * @param {type} gradingTypeModel
     * @param {type} gradeChoiceModel
     * @param {type} teacherModel
     * @param {type} absencereasonModel
     * @param {type} absenceModel
     * @param {type} roomModel
     * @param {type} moduletypeModel
     * @param {type} vocationController
     * @param {type} gradingTypeController
     * @param {type} gradeChoiceController
     * @param {type} teacherController
     * @param {type} absencereasonController
     * @param {type} absenceController
     * @param {type} roomController
     * @param {type} moduletypeController
     * @returns {unresolved}
     */
    define([
        'angular',
        'app/config',
        'app/model/vocationModel',
        'app/model/gradingTypeModel',
        'app/model/gradeChoiceModel',
        'app/model/teacherModel',
        'app/model/absencereasonModel',
        'app/model/absenceModel',
        'app/model/roomModel',
        'app/model/moduletypeModel',
        'app/controller/vocationController',
        'app/controller/gradingTypeController',
        'app/controller/gradeChoiceController',
        'app/controller/teacherController',
        'app/controller/absencereasonController',
        'app/controller/absenceController',
        'app/controller/roomController',
        'app/controller/moduletypeController'


    ], function (
            angular,
            config,
            vocationModel,
            gradingTypeModel,
            gradeChoiceModel,
            teacherModel,
            absencereasonModel,
            absenceModel,
            roomModel,
            moduletypeModel,
            vocationController,
            gradingTypeController,
            gradeChoiceController,
            teacherController,
            absencereasonController,
            absenceController,
            roomController,
            moduletypeController
            ) {

        var adminModule = angular.module('adminModule', [
            'ngRoute',
            'ngResource',
            'ngTouch',
            'ui.grid',
            'ui.grid.edit',
            'ui.grid.cellNav',
            'ui.grid.saveState',
            'ui.grid.selection',
            'ui.grid.cellNav',
            'ui.grid.resizeColumns',
            'ui.grid.moveColumns',
            'ui.grid.pinning',
            'ui.grid.grouping'
        ]);

        adminModule.config(config);

        adminModule.factory('vocationModel', vocationModel);
        adminModule.factory('teacherModel', teacherModel);
        adminModule.factory('gradingTypeModel', gradingTypeModel);
        adminModule.factory('gradeChoiceModel', gradeChoiceModel);
        adminModule.factory('absencereasonModel', absencereasonModel);
        adminModule.factory('absenceModel', absenceModel);
        adminModule.factory('roomModel', roomModel);
        adminModule.factory('moduletypeModel', moduletypeModel);

        adminModule.controller('vocationController', vocationController);
        adminModule.controller('teacherController', teacherController);
        adminModule.controller('gradingTypeController', gradingTypeController);
        adminModule.controller('gradeChoiceController', gradeChoiceController);
        adminModule.controller('absencereasonController', absencereasonController);
        adminModule.controller('absenceController', absenceController);
        adminModule.controller('roomController', roomController);      
        adminModule.controller('moduletypeController', moduletypeController);
        return adminModule;
    });

}(define));
