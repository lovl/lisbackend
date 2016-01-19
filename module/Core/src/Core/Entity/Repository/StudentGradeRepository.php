<?php

namespace Core\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * StudentGradeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StudentGradeRepository extends EntityRepository implements CRUD
{

    /**
     *
     * @var string
     */
    protected $baseAlias = 'studentgrade';

    /**
     *
     * @var string 
     */
    protected $baseEntity = 'Core\Entity\StudentGrade';

    /**
     * 
     * @return string
     */
    protected function dqlStart()
    {
        return "SELECT 
                    partial $this->baseAlias.{
                        id,
                        trashed
                    },
                    partial student.{
                        id
                        },
                    partial contactlesson.{
                        id
                        },
                    partial absenceReason.{
                        id
                        }
                FROM $this->baseEntity $this->baseAlias
                JOIN $this->baseAlias.contactLesson contactlesson
                LEFT JOIN $this->baseAlias.student student
                LEFT JOIN $this->baseAlias.absenceReason absenceReason";
    }

}
