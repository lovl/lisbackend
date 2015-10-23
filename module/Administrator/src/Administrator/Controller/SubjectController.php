<?php

namespace Administrator\Controller;

use Zend\View\Model\JsonModel;
use Core\Controller\AbstractBaseController;

/**
 * @author sander
 */
class SubjectController extends AbstractBaseController
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
                        ->get('subject_service')
                        ->GetList($this->GetParams())
        );
    }

    /**
     * POST
     * 
     * @param array $data
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('subject_service')
                        ->Create($data)
        );
    }

    /**
     * GET
     * 
     * @param int $id
     * @return JsonModel
     */
    public function get($id)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('subject_service')
                        ->Get($id)
        );
    }

    /**
     * PUT
     * 
     * @param int $id
     * @param array $data
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('subject_service')
                        ->Update($id, $data)
        );
    }

    /**
     * DELETE
     * 
     * @param int $id
     * @param array $data
     * @return JsonModel
     */
    public function delete($id)
    {
        return new JsonModel(
                $this
                        ->getServiceLocator()
                        ->get('subject_service')
                        ->Delete($id)
        );
    }

}
