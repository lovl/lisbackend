<?php

/**
 * Licence of Learning Info System (LIS)
 * 
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arnold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE
 */

namespace Administrator\Controller;

use Zend\View\Model\JsonModel;
use Core\Controller\AbstractAdministratorBaseController as Base;

/**
 * Rest API access to moduletype data.
 * 
 * @author Sander Mets <sandermets0@gmail.com>
 * @author Alar Aasa <alar@alaraasa.ee>
 * @author Eleri Apsolon <eleri.apsolon@gmail.com>
 */
class ModuleTypeController extends Base
{
    /**
     * 
     * @var string
     */
    protected $service = 'moduletype_service';

    /**
     * <h2>GET admin/ModuleType</h2>
     * <h3>URL Parameters</h3>
     * <code>limit(integer)
     * page(integer)</code>
     * @return JsonModel
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * <h2>POST admin/ModuleType</h2>
     * <h3>Body</h3>
     * <code>name(string)*</code>
     * @param int @data
     * @return JsonModel
     */
    public function create($data)
    {
        return parent::create($data);
    }

    /**
     * <h2>GET admin/ModuleType/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * @return JsonModel
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * <h2>PUT admin/ModuleType/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * <h3>Body</h3>
     * <code>name(string)*</code>
     * @return JsonModel
     */
    public function update($id, $data)
    {
        return parent::update($id, $data);
    }

    /**
     * <h2>DELETE administrator/ModuleType/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * @return JsonModel
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

}
