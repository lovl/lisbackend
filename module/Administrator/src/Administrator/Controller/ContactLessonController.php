<?php

namespace Administrator\Controller;

use Zend\View\Model\JsonModel;
use Core\Controller\AbstractBaseController;

/**
 * @author sander
 */
class ContactLessonController extends AbstractBaseController
{

    /**
     * GET
     * 
     * @return JsonModel
     */
    public function getList()
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('contactlesson_service')
                        ->GetList($this->GetParams())
        );
    }

    /**
     * POST
     * 
     * @param type $data
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('contactlesson_service')
                        ->Create($data)
        );
    }

    /**
     * GET
     * 
     * @param type $id
     * @return JsonModel
     */
    public function get($id)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('contactlesson_service')
                        ->Get($id)
        );
    }

    /**
     * PUT
     * 
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('contactlesson_service')
                        ->Update($id, $data)
        );
    }

    /**
     * DELETE
     * 
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function delete($id)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('contactlesson_service')
                        ->Delete($id)
        );
    }

}