<?php

/**
 * LIS development
 *
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arnold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE.txt
 */

namespace AdministratorTest\Controller;

use Administrator\Controller\StudentGradeController;
use Zend\Json\Json;
use Zend\Validator\Regex;

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

/**
 * @author Eleri Apsolon <eleri.apsolon@gmail.com>
 */
class StudentGradeControllerTest extends UnitHelpers
{

    /**
     * REST access setup
     */
    protected function setUp()
    {
        $this->controller = new StudentGradeController();
        parent::setUp();
    }

    /**
     * NOT ALLOWED
     */
    public function testCreate()
    {
        $this->request->setMethod('post');
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->PrintOut($result, false);

        $this->assertEquals(405, $response->getStatusCode());
    }

    /**
     * NOT ALLOWED
     */
    public function testUpdate()
    {
        $this->routeMatch->setParam('id', 1); //fake id no need for real id
        $this->request->setMethod('put');
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->PrintOut($result, false);

        $this->assertEquals(405, $response->getStatusCode());
    }

    /**
     * NOT ALLOWED
     */
    public function testDelete()
    {
        $this->routeMatch->setParam('id', 1); //fake id no need for real id
        $this->request->setMethod('delete');
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->PrintOut($result, false);

        $this->assertEquals(405, $response->getStatusCode());
    }

    /**
     * create one before getting
     * Should be successful
     */
    public function testGet()
    {
        //create user
        $administrator = $this->CreateAdministrator();
        $lisUser = $this->CreateAdministratorUser($administrator);

        //now we have created adminuser set to current controller
        $this->controller->setLisUser($lisUser);
        $this->controller->setLisPerson($administrator);

        $this->request->setMethod('get');
        $this->routeMatch->setParam('id', $this->CreateStudentGrade()->getId());
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->PrintOut($result, false);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);
    }

    /**
     * create one before asking list
     * Should be successful
     */
    public function testGetList()
    {
        //create user
        $administrator = $this->CreateAdministrator();
        $lisUser = $this->CreateAdministratorUser($administrator);

        //now we have created adminuser set to current controller
        $this->controller->setLisUser($lisUser);
        $this->controller->setLisPerson($administrator);

        $this->CreateStudentGrade();
        $this->request->setMethod('get');
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->PrintOut($result, false);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);
        $this->assertGreaterThan(0, count($result->data));
    }

    /**
     * TEST rows get read by limit and page params
     * Should be successful
     */
    public function testGetListWithPaginaton()
    {
        //create user
        $administrator = $this->CreateAdministrator();
        $lisUser = $this->CreateAdministratorUser($administrator);

        //now we have created adminuser set to current controller
        $this->controller->setLisUser($lisUser);
        $this->controller->setLisPerson($administrator);

        $this->request->setMethod('get');

        //set record limit to 1
        $q = 'page=1&limit=1'; //imitate real param format
        $params = [];
        parse_str($q, $params);
        foreach ($params as $key => $value) {
            $this->request->getQuery()->set($key, $value);
        }

        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->PrintOut($result, false);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);
        $this->assertLessThanOrEqual(1, count($result->data));
    }

    /**
     * Should be successful
     */
    public function testGetTrashedList()
    {
        //create user
        $administrator = $this->CreateAdministrator();
        $lisUser = $this->CreateAdministratorUser($administrator);

        //now we have created adminuser set to current controller
        $this->controller->setLisUser($lisUser);
        $this->controller->setLisPerson($administrator);

        //prepare one studentgrade with trashed flag set up
        $entity = $this->CreateStudentGrade();
        $entity->setTrashed(1);
        $this->em->persist($entity);
        $this->em->flush($entity); //save to db with trashed 1
        $where = [
            'trashed' => 1,
            'id' => $entity->getId()
        ];
        $whereJSON = Json::encode($where);
        $whereURL = urlencode($whereJSON);
        $whereURLPart = "where=$whereURL";
        $q = "page=1&limit=1&$whereURLPart"; //imitate real param format

        $params = [];
        parse_str($q, $params);
        foreach ($params as $key => $value) {
            $this->request->getQuery()->set($key, $value);
        }

        $this->request->setMethod('get');

        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->PrintOut($result, false);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);

        //limit is set to 1
        $this->assertEquals(1, count($result->data));

        //assert all results have trashed not null
        foreach ($result->data as $value) {
            $this->assertEquals(1, $value['trashed']);
        }
    }

    //NO LONGER NEEDED
//    public function testTrashed()
//    {
//        //create one to update later
//        $entity = $this->CreateStudentGrade();
//        $id = $entity->getId();
//        $trashedOld = $entity->getTrashed();
//        //prepare request
//        $this->routeMatch->setParam('id', $id);
//        $this->request->setMethod('put');
//        $this->request->setContent(http_build_query([
//            'trashed' => 1,
//            'id' => $id,
//            'contactLesson' => $entity->getContactLesson()->getId()
//        ]));
//        //fire request
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//        //set new data
//        $repository = $this->em
//                ->getRepository('Core\Entity\StudentGrade')
//                ->find($result->data['id']);
//        $this->assertNotEquals(
//                $trashedOld, $repository->getTrashed()
//        );
//    }
//    
//    public function testUpdate()
//    {
//        //create one to  update later on
//        $studentGrade = $this->CreateStudentGrade();
//
//
//        $studentIdOld = $studentGrade->getStudent()->getId();
//        $contactLessonIdOld = $studentGrade->getContactLesson()->getId();
//        $gradeChoiceIdOld = $studentGrade->getGradeChoice()->getId();
//        $teacherIdOld = $studentGrade->getTeacher()->getId();
//
//
//        $this->PrintOut($studentIdOld, false);
//        $this->PrintOut($contactLessonIdOld, false);
//        $this->PrintOut($gradeChoiceIdOld, false);
//        $this->PrintOut($teacherIdOld, false);
//
//        //prepare request
//        $this->request->setMethod('put');
//        $this->routeMatch->setParam('id', $studentGrade->getId());
//
//        $this->request->setContent(http_build_query([
//            'contactLesson' => $this->CreateContactLesson()->getId(),
//            'student' => $this->CreateStudent()->getId(),
//            'gradeChoice' => $this->CreateGradeChoice()->getId(),
//            'teacher' => $this->CreateTeacher()->getId(),
//        ]));
//
//        //fire request
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//
//
//
//        $this->assertNotEquals($studentIdOld, $result->data['student']['id']);
//        $this->assertNotEquals($contactLessonIdOld, $result->data['contactLesson']['id']);
//        $this->assertNotEquals($gradeChoiceIdOld, $result->data['gradeChoice']['id']);
//        $this->assertNotEquals($teacherIdOld, $result->data['teacher']['id']);
//    }

    /**
     * Test with wrong data
     */
//    public function testUpdateFalseData()
//    {
//        $data = [
//            //'notes' => uniqid() . 'StudentGradeNotes',
//            'gradeChoice' => $this->CreateGradeChoice()->getId(),
//            'student' => $this->CreateStudent()->getId(),
//            'teacher' => $this->CreateTeacher()->getId(),
//            'contactLesson' => $this->CreateContactLesson()->getId()
//        ];
//        //create one to  update later on
//        $studentGrade = $this->CreateStudentGrade($data);
//        $this->request->setMethod('put');
//        $this->routeMatch->setParam('id', $studentGrade->getId());
//        $this->request->setContent(http_build_query([
//            'contactLesson' => $this->CreateContactLesson()->getId(),
//            'student' => $this->CreateStudent()->getId(),
//            'gradeChoice' => $this->CreateGradeChoice()->getId(),
//            'teacher' => $this->CreateTeacher()->getId(),
//            'module' => $this->CreateModule()->getId(),
//        ]));
//
//        //fire request
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertNotEquals(1, $result->success);
//    }

    /**
     * TEST row gets deleted by id
     * can only try to delete smt what is trashed
     */
//    public function testDeleteNotTrashed()
//    {
//        $entity = $this->CreateStudentGrade();
//        $idOld = $entity->getId();
//
//        $this->routeMatch->setParam('id', $entity->getId());
//        $this->request->setMethod('delete');
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertNotEquals(1, $result->success);
//        $this->em->clear();
//
//        //test it is not in the database anymore
//        $deleted = $this->em
//                ->getRepository('Core\Entity\StudentGrade')
//                ->Get($idOld);
//
//        $this->assertNotEquals(null, $deleted);
//    }
//
//    public function testDelete()
//    {
//
//        $entity = $this->CreateStudentGrade();
//        $idOld = $entity->getId();
//        $entity->setTrashed(1);
//        $this->em->persist($entity);
//        $this->em->flush($entity);
//
//        $this->routeMatch->setParam('id', $entity->getId());
//        $this->request->setMethod('delete');
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//        $this->em->clear();
//
//        //test if it is not in the database anymore
//        $deleted = $this->em
//                ->getRepository('Core\Entity\StudentGrade')
//                ->find($idOld);
//
//        $this->assertEquals(null, $deleted);
//    }
//    public function testCreatedByAndUpdatedBy()
//    {
//        $this->request->setMethod('post');
//
//        $notes = 'StudentGrade notes' . uniqid();
//        $studentGrade = $this->CreateStudentGrade()->getId();
//        $student = $this->CreateStudent()->getId();
//        $contactLesson = $this->CreateContactLesson()->getId();
//        $teacher = $this->CreateTeacher()->getId();
//        $gradeChoice = $this->CreateGradeChoice()->getId();
//
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $student);
//        $this->request->getPost()->set('studentGrade', $studentGrade);
//        $this->request->getPost()->set('contactLesson', $contactLesson);
//        $this->request->getPost()->set('teacher', $teacher);
//        $this->request->getPost()->set('gradeChoice', $gradeChoice);
//
//        $lisUserCreates = $this->CreateLisUser();
//        $lisUserCreatesId = $lisUserCreates->getId();
//        $this->request->getPost()->set("createdBy", $lisUserCreatesId);
//
//        $lisUserUpdates = $this->CreateLisUser();
//        $lisUserUpdatesId = $lisUserUpdates->getId();
//        $this->request->getPost()->set("updatedBy", $lisUserUpdatesId);
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//
//        $repository = $this->em->getRepository('Core\Entity\StudentGrade');
//        $newSubjectRound = $repository->find($result->data['id']);
//        $this->assertEquals($lisUserCreatesId, $newSubjectRound->getCreatedBy()->getId());
//        $this->assertEquals($lisUserUpdatesId, $newSubjectRound->getUpdatedBy()->getId());
//    }
//    
//    public function testCreatedAtAndUpdatedAt()
//    {
//        $this->request->setMethod('post');
//
//        $notes = 'StudentGrade notes' . uniqid();
//        $studentGrade = $this->CreateStudentGrade()->getId();
//        $student = $this->CreateStudent()->getId();
//        $contactLesson = $this->CreateContactLesson()->getId();
//        $teacher = $this->CreateTeacher()->getId();
//        $gradeChoice = $this->CreateGradeChoice()->getId();
//
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $student);
//        $this->request->getPost()->set('studentGrade', $studentGrade);
//        $this->request->getPost()->set('contactLesson', $contactLesson);
//        $this->request->getPost()->set('teacher', $teacher);
//        $this->request->getPost()->set('gradeChoice', $gradeChoice);
//
//        $lisUser = $this->CreateLisUser();
//        $this->request->getPost()->set("lisUser", $lisUser->getId());
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        
//        $this->PrintOut($result, false);
//        
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//        
//        $repository = $this->em->getRepository('Core\Entity\StudentGrade');
//        $newStudentGrade = $repository->find($result->data['id']);
//        $this->assertNotNull($newStudentGrade->getCreatedAt());
//        $this->assertNull($newStudentGrade->getUpdatedAt());
//    }
    /**
     * imitate POST request
     * create new with correct data see entity
     * creates new row to database
     */
//    public function testCreateWithContactLesson()
//    {
//        $notes = 'StudentGrade notes' . uniqid();
//        $this->request->setMethod('post');
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $this->CreateStudent()->getId());
//        $this->request->getPost()->set('contactLesson', $this->CreateContactLesson()->getId());
//        $this->request->getPost()->set('teacher', $this->CreateTeacher()->getId());
//        $this->request->getPost()->set('gradeChoice', $this->CreateGradeChoice()->getId());
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(405, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//    }

    /**
     * imitate POST request
     * create new with correct data see entity
     * creates new row to database
     */
//    public function testCreateWithModule()
//    {
//        $notes = 'StudentGrade notes' . uniqid();
//        $this->request->setMethod('post');
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $this->CreateStudent()->getId());
//        $this->request->getPost()->set('module', $this->CreateModule()->getId());
//        $this->request->getPost()->set('teacher', $this->CreateTeacher()->getId());
//        $this->request->getPost()->set('gradeChoice', $this->CreateGradeChoice()->getId());
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//    }

    /**
     * imitate POST request
     * create new with correct data see entity
     * creates new row to database
     */
//    public function testCreateWithSubjectRound()
//    {
//        $notes = 'StudentGrade notes' . uniqid();
//        $this->request->setMethod('post');
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $this->CreateStudent()->getId());
//        $this->request->getPost()->set('subjectRound', $this->CreateSubjectRound()->getId());
//        $this->request->getPost()->set('teacher', $this->CreateTeacher()->getId());
//        $this->request->getPost()->set('gradeChoice', $this->CreateGradeChoice()->getId());
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//    }

    /**
     * imitate POST request
     * create new with correct data see entity
     * creates new row to database
     */
//    public function testCreateWithIndependentWork()
//    {
//        $notes = 'StudentGrade notes' . uniqid();
//        $this->request->setMethod('post');
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $this->CreateStudent()->getId());
//        $this->request->getPost()->set('independentWork', $this->CreateIndependentWork()->getId());
//        $this->request->getPost()->set('teacher', $this->CreateTeacher()->getId());
//        $this->request->getPost()->set('gradeChoice', $this->CreateGradeChoice()->getId());
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertEquals(1, $result->success);
//    }

    /**
     * Giving grade to nothing
     */
//    public function testCreateWithNoSpecification()
//    {
//        $notes = 'StudentGrade notes' . uniqid();
//        $this->request->setMethod('post');
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $this->CreateStudent()->getId());
//        $this->request->getPost()->set('teacher', $this->CreateTeacher()->getId());
//        $this->request->getPost()->set('gradeChoice', $this->CreateGradeChoice()->getId());
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertNotEquals(1, $result->success);
//    }
//    public function testCreateWithIMultipleData()
//    {
//        $notes = 'StudentGrade notes' . uniqid();
//        $this->request->setMethod('post');
//        $this->request->getPost()->set('notes', $notes);
//        $this->request->getPost()->set('student', $this->CreateStudent()->getId());
//        $this->request->getPost()->set('subjectRound', $this->CreateSubjectRound()->getId());
//        $this->request->getPost()->set('independentWork', $this->CreateIndependentWork()->getId());
//        $this->request->getPost()->set('teacher', $this->CreateTeacher()->getId());
//        $this->request->getPost()->set('gradeChoice', $this->CreateGradeChoice()->getId());
//
//        $result = $this->controller->dispatch($this->request);
//        $response = $this->controller->getResponse();
//        $this->PrintOut($result, false);
//
//        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertNotEquals(1, $result->success);
//    }
}
