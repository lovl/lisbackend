<?php

namespace Core\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AbsenceReasonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AbsenceReasonRepository extends EntityRepository implements CRUD
{

    /**
     * 
     * @param type $params
     * @param type $extra
     */
    public function GetList($params = null, $extra = null)
    {
        ;//TODO
    }

    /**
     * 
     * @param type $id
     * @param type $returnPartial
     * @param type $extra
     */
    public function Get($id, $returnPartial = false, $extra = null)
    {
        ;//TODO
    }

    /**
     * 
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     */
    public function Create($data, $returnPartial = false, $extra = null)
    {
        ;//TODO
    }

    /**
     * 
     * @param type $id
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     */
    public function Update($id, $data, $returnPartial = false, $extra = null)
    {
        ;//TODO
    }

    /**
     * 
     * @param type $id
     * @param type $extra
     */
    public function Delete($id, $extra = null)
    {
        ;//TODO
    }

}