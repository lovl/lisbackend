<?php

namespace AdministratorTest\Controller;

use AdministratorTest\Bootstrap;
use Administrator\Controller\VocationController;
use Zend\Http\Request;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;

//error_reporting(E_ALL | E_STRICT);
//chdir(__DIR__);

/**
 * @author sander
 */
class SampleControllerTest extends UnitHelpers
{

    protected function setUp()
    {
        $this->controller = new VocationController();
        parent::setUp();
    }

    /**
     * create new with correct data see entity
     */
    public function testCreate()
    {
        $this->request->setMethod('post');

        $this->request->getPost()->set("name", "Name vocation");
        $this->request->getPost()->set("code", uniqid());
        $this->request->getPost()->set("durationEKAP", 120);

        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);
        $this->PrintOut($result, false);
    }

    /**
     * create one before getting
     */
    public function testGet()
    {
        $this->request->setMethod('get');
        $this->routeMatch->setParam('id', $this->CreateVocation()->getId());
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);
        $this->PrintOut($result, FALSE);
    }

    /**
     * create one before asking list
     */
    public function testGetList()
    {
        $this->CreateVocation();
        $this->request->setMethod('get');
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);
        $this->assertGreaterThan(0, count($result->data));
        $this->PrintOut($result, FALSE);
    }

    //update jääb sulle pärast endale teha
//    public function testUpdate()
//    {
//        //TODO
//        //create vocation
//        
//        //put values to variables
//        
//        //create update query with different values
//        
//        //get answer check that values are changed
//    }

    public function testDelete()
    {
        $entity = $this->CreateVocation();
        $idOld = $entity->getId();

        $this->routeMatch->setParam('id', $entity->getId());
        $this->request->setMethod('delete');

        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $result->success);
        $this->em->clear();

        //test it is not in the database anymore
        $deleted = $this->em
                ->getRepository('Core\Entity\Vocation')
                ->Get($idOld);

        $this->assertEquals(null, $deleted);

        $this->PrintOut($result, false);
    }

}
