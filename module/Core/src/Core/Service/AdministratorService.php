<?php

/**
 * LIS development
 * 
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2016 Lis Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace Core\Service;

use Exception;

/**
 * Description of AdministratorService
 *
 * @author Sander Mets <sandermets0@gmail.com>
 */
class AdministratorService extends AbstractBaseService
{

    /**
     * 
     * @param array $params
     * @param stdClass|NULL $extra
     * @return array
     */
    public function GetList($params, $extra = null)
    {
        try {

            $p = $this->getEntityManager()
                    ->getRepository('Core\Entity\Administrator')
                    ->GetList($params, $extra);

            $p->setItemCountPerPage($params['limit']);
            $p->setCurrentPageNumber($params['page']);

            $params['itemCount'] = $p->getTotalItemCount();
            $params['pageCount'] = $p->count();

            return [
                'success' => true,
                'params' => $params,
                'data' => (array) $p->getCurrentItems(),
            ];
        } catch (Exception $ex) {
            return [
                'success' => false,
                'message' => $ex->getMessage()
            ];
        }
    }

    /**
     * 
     * @param int $id
     * @param stdClass|NULL $extra
     * @return array
     */
    public function Get($id, $extra = null)
    {
        try {
            return [
                'success' => true,
                'data' => $this
                        ->getEntityManager()
                        ->getRepository('Core\Entity\Administrator')
                        ->Get($id, true, $extra)
            ];
        } catch (Exception $ex) {
            return [
                'success' => false,
                'message' => $ex->getMessage()
            ];
        }
    }

    /**
     * 
     * @param array $data
     * @param stdClass|NULL $extra
     * @return array
     */
    public function Create($data, $extra = null)
    {
        try {
            return [
                'success' => true,
                'data' => $this
                        ->getEntityManager()
                        ->getRepository('Core\Entity\Administrator')
                        ->Create($data, true, $extra)
            ];
        } catch (Exception $ex) {

            return [
                'success' => false,
                'message' => $ex->getMessage()
            ];
        }
    }

    /**
     * 
     * @param int $id
     * @param array $data
     * @param stdClass|NULL $extra
     * @return array
     */
    public function Update($id, $data, $extra = null)
    {
        try {
            return [
                'success' => true,
                'data' => $this
                        ->getEntityManager()
                        ->getRepository('Core\Entity\Administrator')
                        ->Update($id, $data, true, $extra)
            ];
        } catch (Exception $ex) {
            return [
                'success' => false,
                'message' => $ex->getMessage()
            ];
        }
    }

    /**
     * 
     * @param int $id
     * @param stdClass|NULL $extra
     * @return array
     */
    public function Delete($id, $extra = null)
    {
        try {
            return [
                'success' => true,
                'id' => $this
                        ->getEntityManager()
                        ->getRepository('Core\Entity\Administrator')
                        ->Delete($id, $extra)
            ];
        } catch (Exception $ex) {
            return [
                'success' => false,
                'message' => $ex->getMessage()
            ];
        }
    }

}
