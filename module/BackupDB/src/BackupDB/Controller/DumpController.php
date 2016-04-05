<?php

namespace BackupDB\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DumpController extends AbstractActionController
{

    /**
     * @var string
     */
    protected $service = 'dump_service';

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    /**
     * Initial Display; List filenames of dumps on server for front-end display
     * Set up XDebug
     * @param type $filter
     */
    public function indexAction()
    {
        $this
                ->getServiceLocator()
                ->get($this->service)
                ->createDump('manual');
        die('ENDPOINT');//we cut framework from here
//        return new ViewModel([
//            'content' => 'Backup Index Placeholder'
//        ]);
    }

    /**
     * Create new dump and return to client
     * 
     * @return ViewModel
     */
    public function createManualAction()
    {
        $this
                ->getServiceLocator()
                ->get($this->service)
                ->createDump('manual');
    }

    /**
     * Create new dump and save to server
     * 
     * @return ViewModel
     */
    public function createServerAction()
    {
        return new ViewModel([
            'content' => 'Server Dump Placeholder'
        ]);
    }

    /**
     * Push server dump named $dumpName to DB, or push raw $dumpData to DB
     * 
     * @param type $dumpName
     * @param type $dumpData
     */
    public function pushAction($dumpName, $dumpData = null)
    {
        return new ViewModel([
            'content' => 'Push Backup Placeholder'
        ]);
    }

}
