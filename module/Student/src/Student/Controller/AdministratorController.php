<?php

/**
 * Licence of Learning Info System (LIS)
 * 
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arnold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE.txt
 */

namespace Student\Controller;

use Zend\View\JsonModel;
use Core\Controller\AbstractStudentBaseController as Base;

/*
 * Rest API access to administrator data.
 * 
 * @author Alar Aasa <alar@alaraasa.ee>
 * @author Eleri Apsolon <eleri.apsolon@gmail.com>
 */

class AdministratorController extends Base
{
    /**
     *
     * @var type 
     */
    protected $service = 'administrator_service';
    
    /**
     * <h2>GET student/administrator</h2>
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
     * <h2>GET student/administrator</h2>
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
      * <h2>POST student/administrator</h2>
      * <h3>Body</h3>
      * <code>Not allowed</code>
      * 
      * @param int $data
      * @return JsonModel
      */
    public function create($data)
    {
        return parent::notAllowed();
    }
    
     /**
     * <h2>PUT student/administrator/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)</code>
     * <h3>Body</h3>
     * <code>Not allowed</code>
     * 
     * @param int $id
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return parent::notAllowed();
    }
    
     /**
     * <h2>DELETE student/administrator/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)</code>
     * 
     * @param int $id
     * @return JsonModel
     */
    public function delete($id)
    {
        return parent::notAllowed();
    }
}
