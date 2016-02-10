<?php

/**
 * Licence of Learning Info System (LIS)
 * 
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arnold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE
 */

namespace LisAuth\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * @author Sander Mets <sandermets0@gmail.com>
 */
class RegisterStudentController extends AbstractRestfulController
{

    /**
     * 
     * @return LisAuth\Service\LisRegisterService
     */
    public function getLisAuthService()
    {
        return $this->getServiceLocator()->get('lisauth_service');
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    /**
     * Allow CORS
     * 
     * @return JsonModel
     */
    public function options()
    {
        return new JsonModel([]);
    }

    /**
     * 
     * @return JsonModel
     */
    public function getList()
    {
        return new JsonModel(
                $this->getLisAuthService()->registerStudent([777])
        );
    }

    /**
     * Register new user Student
     * 
     * @param type $data
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel(
                $this
                        ->getLisAuthService()
                        ->registerLisUser($data, 'student')
        );
    }

    /**
     * Update existing user Student
     * 
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return new JsonModel([$id, $data]);
    }

    /**
     * Delete existing user Student
     * 
     * @param type $id
     * @return JsonModel
     */
    public function delete($id)
    {
        return new JsonModel([$id]);
    }

}
