<?php

/**
 * LIS development
 *
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2015-2016 Sander Mets, Eleri Apsolon, Arnold Tšerepov, Marten Kähr, Kristen Sepp, Alar Aasa, Juhan Kõks
 * @license   https://github.com/parnustk/lisbackend/blob/master/LICENSE.txt
 */

namespace Administrator\Controller;

use Zend\View\Model\JsonModel;
use Core\Controller\AbstractAdministratorBaseController as Base;

/**
 * Rest API access to gradechoice data.
 *
 * @author Arnold Tserepov <tserepov@gmail.com>
 * @author Eleri Apsolon <eleri.apsolon@gmail.com>
 */
class GradeChoiceController extends Base {

    /**
     *
     * @var type 
     */
    protected $service = 'gradechoice_service';

    /**
     * GET
     * <h2>GET admin/absencereason</h2>
     * <h3>URL Parameters</h3>
     * <code>limit(integer)
     * page(integer)</code>
     * 
     * @return JsonModel
     */
    public function getList() {
        return parent::getList();
    }

    /**
     * <h2>GET admin/absencereason/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * @param type $id
     * @return JsonModel
     */
    public function get($id) {
        return parent::get($id);
    }

    /**
     * POST
     * <h2>POST admin/absencereason</h2>
     * <h3>Body</h3>
     * <code>Not allowed</code>
     * 
     * @param type $data
     * @return JsonModel
     */
    public function create($data) {
        return parent::notAllowed();
    }

    /**
     * PUT
     * <h2>PUT admin/absencereason/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * <h3>Body</h3>
     * <code>Not allowed</code>
     * 
     * @param type $id
     * @param type $data
     * @return JsonModel
     */
    public function update($id, $data) {
        return parent::notAllowed();
    }

    /**
     * DELETE
     *  <h2>DELETE admin/absencereason/:id</h2>
     * <h3>URL Parameters</h3>
     * <code>id(integer)*</code>
     * 
     * @param int $id
     * @return JsonModel
     */
    public function delete($id) {
        return parent::delete($id);
    }

}
