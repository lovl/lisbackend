<?php

/**
 * Licence of Learning Info System (LIS)
 * 
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arnold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE.txt
 */

namespace Student\Controller;

use Zend\View\Model\JsonModel;
use Core\Controller\AbstractStudentBaseController as Base;

/**
 *Restrictions for student role:
 * 
 * YES getList
 * YES get
 * 
 * @author Alar Aasa <alar@alaraasa.ee>
 */

class IndependentWorkController extends Base
{
    /**
     * @var string 
     */
    protected $service = 'independentwork_service';
    
    /**
     * <h2>GET student/independentwork</h2>
     * <h3>URL Parameters</h3>
     * <code>limit(integer)
     * page(integer)</code>
     * 
     * @return JsonModel
     */
    public function getList()
    {
        return parent::getList();
    }
    
    /**
     * <h2>GET student/independentwork/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * 
     * @param int $id
     * @return JsonModel
     */
    public function get($id)
    {
        return parent::get($id);
    }
    
    /**
     * <h2>POST student/independentwork</h2>
     * <h3>Body</h3>
     * <code>duedate(datetime)*
     * description(string)*
     * durationAK(integer)*
     * subjectRound(integer)*
     * teacher(integer)*</code>
     * 
     * @param array $data
     * @return JsonModel
     */
    public function create($data)
    {
        return parent::notAllowed();
    }
    
    /**
     * <h2>PUT student/independentwork/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * <h3>Body</h3>
     * <code>duedate(datetime)*
     * description(string)*
     * durationAK(integer)*
     * subjectRound(integer)*
     * teacher(integer)*</code>
     * 
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return parent::notAllowed();
    }
    
    /**
     * <h2>DELETE student/independentwork/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * 
     * @param int $id
     * @return JsonModel
     */
    public function delete($id)
    {
        return parent::notAllowed();
    }
}