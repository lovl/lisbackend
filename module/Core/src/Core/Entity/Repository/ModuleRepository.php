<?php

/**
 * LIS development
 *
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arnold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE.txt
 */

namespace Core\Entity\Repository;

use Core\Entity\Module;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use Exception;
use Zend\Json\Json;
use Doctrine\ORM\Query;

/**
 * @author Sander Mets <sandermets0@gmail.com>
 * @author Eleri Apsolon <eleri.apsolon@gmail.com>
 */
class ModuleRepository extends AbstractBaseRepository
{

    /**
     *
     * @var string
     */
    public $baseAlias = 'module';

    /**
     *
     * @var string 
     */
    public $baseEntity = 'Core\Entity\Module';

    /**
     * 
     * @return string
     */
    protected function dqlStart()
    {
        return "SELECT 
                    partial $this->baseAlias.{
                        id,
                        name,
                        duration,
                        moduleCode,
                        trashed
                    },
                    partial vocation.{
                        id,
                        name,
                        vocationCode
                    },
                    partial moduleType.{
                        id,
                        name
                    },
                    partial gradingType.{
                        id,
                        name
                    }
                FROM $this->baseEntity $this->baseAlias
                JOIN $this->baseAlias.vocation vocation
                JOIN $this->baseAlias.moduleType moduleType 
                JOIN $this->baseAlias.gradingType gradingType";
    }

    /**
     * 
     * @return string
     */
    protected function dqlStudentStart()
    {
        return "SELECT 
                    partial $this->baseAlias.{
                        id,
                        name,
                        duration,
                        moduleCode,
                        trashed
                    },
                    partial vocation.{
                    id
                    },
                    partial moduleType.{
                    id
                    },
                    partial gradingType.{
                    id
                    }
                    FROM $this->baseEntity $this->baseAlias
                    JOIN $this->baseAlias.vocation vocation
                    JOIN $this->baseAlias.moduleType moduleType 
                    JOIN $this->baseAlias.gradingType gradingType";
    }

    /**
     * 
     * @return string
     */
    protected function dqlTeacherStart()
    {
        return "SELECT 
                    partial $this->baseAlias.{
                        id,
                        name,
                        duration,
                        moduleCode,
                        trashed
                    },
                    partial vocation.{
                    id
                    },
                    partial moduleType.{
                    id
                    },
                    partial gradingType.{
                    id
                    }
                    FROM $this->baseEntity $this->baseAlias
                    JOIN $this->baseAlias.vocation vocation
                    JOIN $this->baseAlias.moduleType moduleType 
                    JOIN $this->baseAlias.gradingType gradingType";
    }

    /**
     * 
     * @return string
     */
    protected function dqlAdministratorStart()
    {
        return "SELECT 
                    partial $this->baseAlias.{
                        id,
                        name,
                        duration,
                        moduleCode,
                        trashed
                    },
                    partial vocation.{
                        id,
                        name,
                        vocationCode
                    },
                    partial moduleType.{
                        id
                    },
                    partial gradingType.{
                        id
                    }
                    FROM $this->baseEntity $this->baseAlias
                    JOIN $this->baseAlias.vocation vocation
                    JOIN $this->baseAlias.moduleType moduleType 
                    JOIN $this->baseAlias.gradingType gradingType";
    }

    /**
     * 
     * @param type $data
     * @throws Exception
     */
    private function validateVocation($data)
    {
        if (!key_exists('vocation', $data)) {
            throw new Exception(
            Json::encode(
                    'Missing vocation for module', true
            )
            );
        }

        if (!$data['vocation']) {
            throw new Exception(
            Json::encode(
                    'Missing vocation for module', true
            )
            );
        }
    }

    /**
     * 
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     * @return GradingType
     * @throws Exception
     */
    public function defaultCreate($data, $returnPartial = false, $extra = null)
    {
        $this->validateVocation($data);
        $entity = new Module($this->getEntityManager());
        $vocation = $this->getEntityManager()
                ->getRepository('Core\Entity\Vocation')
                ->find($data['vocation']);
        unset($data['vocation']);
        $entity->setVocation($vocation);
        $entity = $this->validateEntity(
                $entity, $data
        );
        return $this->singleResult($entity, $returnPartial, $extra);
    }

    /**
     * 
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     */
    private function studentCreate($data, $returnPartial = false, $extra = null)
    {
        //set user related data
        $data['createdBy'] = $extra->lisUser->getId();
        $data['updatedBy'] = null;

        return $this->defaultCreate($data, $returnPartial, $extra);
    }

    /**
     * 
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     * @return type
     */
    private function teacherCreate($data, $returnPartial = false, $extra = null)
    {
        $data['createdBy'] = $extra->lisUser->getId();
        $data['updatedBy'] = null;

        return $this->defaultCreate($data, $returnPartial, $extra);
    }

    /**
     * 
     * @param array $data
     * @param bool|null $returnPartial
     * @param stdClass|null $extra
     * @return mixed
     */
    public function administratorCreate($data, $returnPartial = false, $extra = null)
    {
        $data['createdBy'] = $extra->lisUser->getId();
        $data['updatedBy'] = null;

        return $this->defaultCreate($data, $returnPartial, $extra);
    }

    /**
     * 
     * @param array $data
     * @param bool|null $returnPartial
     * @param stdClass|null $extra
     * @return mixed
     */
    public function Create($data, $returnPartial = false, $extra = null)
    {
        if (!$extra) {
            return $this->defaultCreate($data, $returnPartial);
        } else if ($extra->lisRole === 'student') {
            return $this->studentCreate($data, $returnPartial, $extra);
        } else if ($extra->lisRole === 'teacher') {
            return $this->teacherCreate($data, $returnPartial, $extra);
        } else if ($extra->lisRole === 'administrator') {
            return $this->administratorCreate($data, $returnPartial, $extra);
        }
    }

    /**
     * 
     * @param type $entity
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     * @return type
     */
    private function defaultUpdate($entity, $data, $returnPartial = false, $extra = null)
    {
        $this->validateVocation($data);

        $vocation = $this->getEntityManager()
                ->getRepository('Core\Entity\Vocation')
                ->find($data['vocation']);

        $entity->setVocation($vocation);

        unset($data['vocation']);

        $entity->hydrate($data, $this->getEntityManager());

        if (!$entity->validate()) {
            throw new Exception(Json::encode($entity->getMessages(), true));
        }
        //manytomany validate manually
        if (!count($entity->getGradingType())) {
            throw new Exception(Json::encode('Missing vocation for module', true));
        }
        return $this->singleResult($entity, $returnPartial, $extra);
    }

    /**
     * 
     * @param type $entity
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     * @return type
     * @throws Exception
     */
    private function studentUpdate($entity, $data, $returnPartial = false, $extra = null)
    {
        //set user related data
        $data['createdBy'] = null;
        $data['updatedBy'] = $extra->lisUser->getId();

        return $this->defaultUpdate($entity, $data, $returnPartial, $extra);
    }

    /**
     * 
     * @param type $entity
     * @param type $data
     * @param type $returnPartial
     * @param type $extra
     * @return type
     */
    private function teacherUpdate($entity, $data, $returnPartial = false, $extra = null)
    {
        //set user related data
        $data['createdBy'] = null;
        $data['updatedBy'] = $extra->lisUser->getId();

        return $this->defaultUpdate($entity, $data, $returnPartial, $extra);
    }

    /**
     * 
     * @param int|string $id
     * @param array $data
     * @param bool|null $returnPartial
     * @param stdClass|null $extra
     * @return mixed
     */
    public function administratorUpdate($entity, $data, $returnPartial = false, $extra = null)
    {
        //set user related data
        $data['createdBy'] = null;
        $data['updatedBy'] = $extra->lisUser->getId();

        return $this->defaultUpdate($entity, $data, $returnPartial, $extra);
    }

    /**
     * 
     * @param int|string $id
     * @param array $data
     * @param bool|null $returnPartial
     * @param stdClass|null $extra
     * @return mixed
     */
    public function Update($id, $data, $returnPartial = false, $extra = null)
    {
        $entity = $this->find($id);
        if (!$entity) {
            throw new Exception('NOT_FOUND_ENTITY');
        }

        if (!$extra) {
            return $this->defaultUpdate($entity, $data, $returnPartial);
        } else if ($extra->lisRole === 'student') {
            return $this->studentUpdate($entity, $data, $returnPartial, $extra);
        } else if ($extra->lisRole === 'teacher') {
            return $this->teacherUpdate($entity, $data, $returnPartial, $extra);
        } else if ($extra->lisRole === 'administrator') {
            return $this->administratorUpdate($entity, $data, $returnPartial, $extra);
        }
    }

    /**
     * 
     * @param type $entity
     * @return type
     */
    private function defaultDelete($entity)
    {
        $id = $entity->getId();
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
        return $id;
    }

    /**
     * 
     * @param type $entity
     * @param type $extra
     */
    private function studentDelete($entity, $extra = null)
    {
        return $this->defaultDelete($entity, $extra);
    }

    /**
     * 
     * @param type $entity
     * @param type $extra
     * @return type
     */
    private function teacherDelete($entity, $extra = null)
    {
        return $this->defaultDelete($entity, $extra);
    }

    /**
     * 
     * @param type $entity
     * @param type $extra
     * @return type
     */
    private function administratorDelete($entity, $extra = null)
    {
        return $this->defaultDelete($entity, $extra);
    }

    /**
     * Delete only trashed entities
     * 
     * @param int $id
     * @param stdClass|null $extra
     * @return int
     * @throws Exception
     */
    public function Delete($id, $extra = null)
    {
        $entity = $this->find($id);

        if (!$entity) {
            throw new Exception('NOT_FOUND_ENTITY');
        } else if (!$entity->getTrashed()) {
            throw new Exception("NOT_TRASHED");
        }

        if (!$extra) {
            return $this->defaultDelete($entity);
        } else if ($extra->lisRole === 'student') {
            return $this->studentDelete($entity, $extra);
        } else if ($extra->lisRole === 'teacher') {
            return $this->teacherDelete($entity, $extra);
        } else if ($extra->lisRole === 'administrator') {
            return $this->administratorDelete($entity, $extra);
        }
    }

    /**
     * 
     * @param type $id
     * @param type $returnPartial
     * @param type $extra
     * @return type
     */
    private function defaultGet($id, $returnPartial = false, $extra = null)
    {
        if ($returnPartial) {
            return $this->singlePartialById($id, $extra);
        }
        return $this->find($id);
    }

    /**
     * 
     * @param type $entity
     * @param type $returnPartial
     * @param type $extra
     * 
     * @return array
     */
    private function studentGet($entity, $returnPartial = false, $extra = null)
    {
        return $this->defaultGet($entity->getId(), $returnPartial, $extra);
    }

    /**
     * 
     * @param type $entity
     * @param type $returnPartial
     * @param type $extra
     * @return type
     */
    private function teacherGet($entity, $returnPartial = false, $extra = null)
    {
        return $this->defaultGet($entity->getId(), $returnPartial, $extra);
    }

    /**
     * 
     * @param type $entity
     * @param type $returnPartial
     * @param type $extra
     * @return type
     */
    private function administratorGet($entity, $returnPartial = false, $extra = null)
    {
        return $this->defaultGet($entity->getId(), $returnPartial, $extra);
    }

    /**
     * 
     * @param int $id
     * @param bool|null $returnPartial
     * @param stdClass|null $extra
     * @return mixed
     */
    public function Get($id, $returnPartial = false, $extra = null)
    {
        $entity = $this->find($id);

        if (!$entity) {
            throw new Exception('NOT_FOUND_ENTITY');
        }

        if (!$extra) {
            return $this->defaultGet($id, $returnPartial, $extra);
        } else if ($extra->lisRole === 'student') {
            return $this->studentGet($entity, $returnPartial, $extra);
        } else if ($extra->lisRole === 'teacher') {
            return $this->teacherGet($entity, $returnPartial, $extra);
        } else if ($extra->lisRole === 'administrator') {
            return $this->administratorGet($entity, $returnPartial, $extra);
        }
    }

    /**
     * 
     * @param type $params
     * @param type $extra
     * @param type $dqlRestriction
     * @return type
     */
    private function defaultGetList($params = null, $extra = null, $dqlRestriction = null)
    {
        $dql = $this->dqlStart();
        $dql .= $this->dqlWhere($params, $extra);

        if ($dqlRestriction) {
            $dql .= $dqlRestriction;
        }
        return $this->wrapPaginator($dql);
    }

    /**
     * 
     * @param type $params
     * @param type $extra
     * @return type
     */
    private function studentGetList($params = null, $extra = null)
    {
        return $this->defaultGetList($params, $extra);
    }

    /**
     * 
     * @param type $params
     * @param type $extra
     * @return type
     */
    private function teacherGetList($params = null, $extra = null)
    {
        return $this->defaultGetList($params, $extra);
    }

    /**
     * 
     * @param type $params
     * @param type $extra
     * @return type
     */
    private function administratorGetList($params = null, $extra = null)
    {
        return $this->defaultGetList($params, $extra);
    }

    /**
     * 
     * @param array $params
     * @param stdClass|null $extra
     * @return Paginator
     */
    public function GetList($params = null, $extra = null)
    {
        if (!$extra) {
            return $this->defaultGetList($params, $extra);
        } else if ($extra->lisRole === 'student') {
            return $this->studentGetList($params, $extra);
        } else if ($extra->lisRole === 'teacher') {
            return $this->teacherGetList($params, $extra);
        } else if ($extra->lisRole === 'administrator') {
            return $this->administratorGetList($params, $extra);
        }
    }

}
