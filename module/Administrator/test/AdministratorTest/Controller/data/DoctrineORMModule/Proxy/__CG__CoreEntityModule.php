<?php

namespace DoctrineORMModule\Proxy\__CG__\Core\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Module extends \Core\Entity\Module implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'name', 'duration', 'moduleCode', 'subject', 'studentGrade', 'vocation', 'moduleType', 'gradingType', 'trashed', 'createdBy', 'updatedBy', 'createdAt', 'updatedAt', 'VF', 'form', 'doctrineHydrator', 'entityManager');
        }

        return array('__isInitialized__', 'id', 'name', 'duration', 'moduleCode', 'subject', 'studentGrade', 'vocation', 'moduleType', 'gradingType', 'trashed', 'createdBy', 'updatedBy', 'createdAt', 'updatedAt', 'VF', 'form', 'doctrineHydrator', 'entityManager');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Module $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getDuration()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDuration', array());

        return parent::getDuration();
    }

    /**
     * {@inheritDoc}
     */
    public function getModuleCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModuleCode', array());

        return parent::getModuleCode();
    }

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubject', array());

        return parent::getSubject();
    }

    /**
     * {@inheritDoc}
     */
    public function getStudentGrade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStudentGrade', array());

        return parent::getStudentGrade();
    }

    /**
     * {@inheritDoc}
     */
    public function getVocation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVocation', array());

        return parent::getVocation();
    }

    /**
     * {@inheritDoc}
     */
    public function getModuleType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModuleType', array());

        return parent::getModuleType();
    }

    /**
     * {@inheritDoc}
     */
    public function getGradingType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGradingType', array());

        return parent::getGradingType();
    }

    /**
     * {@inheritDoc}
     */
    public function getTrashed()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTrashed', array());

        return parent::getTrashed();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedBy', array());

        return parent::getCreatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedBy', array());

        return parent::getUpdatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', array());

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setDuration($duration)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDuration', array($duration));

        return parent::setDuration($duration);
    }

    /**
     * {@inheritDoc}
     */
    public function setModuleCode($moduleCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModuleCode', array($moduleCode));

        return parent::setModuleCode($moduleCode);
    }

    /**
     * {@inheritDoc}
     */
    public function setSubject(\Core\Entity\Subject $subject)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubject', array($subject));

        return parent::setSubject($subject);
    }

    /**
     * {@inheritDoc}
     */
    public function setStudentGrade(\Core\Entity\StudentGrade $studentGrade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStudentGrade', array($studentGrade));

        return parent::setStudentGrade($studentGrade);
    }

    /**
     * {@inheritDoc}
     */
    public function setVocation(\Core\Entity\Vocation $vocation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVocation', array($vocation));

        return parent::setVocation($vocation);
    }

    /**
     * {@inheritDoc}
     */
    public function setModuleType(\Core\Entity\ModuleType $moduleType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModuleType', array($moduleType));

        return parent::setModuleType($moduleType);
    }

    /**
     * {@inheritDoc}
     */
    public function setGradingType(\Core\Entity\GradingType $gradingType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGradingType', array($gradingType));

        return parent::setGradingType($gradingType);
    }

    /**
     * {@inheritDoc}
     */
    public function setTrashed($trashed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTrashed', array($trashed));

        return parent::setTrashed($trashed);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedBy(\Core\Entity\LisUser $createdBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', array($createdBy));

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedBy(\Core\Entity\LisUser $updatedBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedBy', array($updatedBy));

        return parent::setUpdatedBy($updatedBy);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', array($updatedAt));

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function addGradingType(\Doctrine\Common\Collections\Collection $gradingTypes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addGradingType', array($gradingTypes));

        return parent::addGradingType($gradingTypes);
    }

    /**
     * {@inheritDoc}
     */
    public function removeGradingType(\Doctrine\Common\Collections\Collection $gradingTypes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeGradingType', array($gradingTypes));

        return parent::removeGradingType($gradingTypes);
    }

    /**
     * {@inheritDoc}
     */
    public function refreshTimeStamps()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'refreshTimeStamps', array());

        return parent::refreshTimeStamps();
    }

    /**
     * {@inheritDoc}
     */
    public function getDoctrineHydrator()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDoctrineHydrator', array());

        return parent::getDoctrineHydrator();
    }

    /**
     * {@inheritDoc}
     */
    public function getEntityManager()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEntityManager', array());

        return parent::getEntityManager();
    }

    /**
     * {@inheritDoc}
     */
    public function setEntityManager(\Doctrine\ORM\EntityManager $em)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEntityManager', array($em));

        return parent::setEntityManager($em);
    }

    /**
     * {@inheritDoc}
     */
    public function getForm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getForm', array());

        return parent::getForm();
    }

    /**
     * {@inheritDoc}
     */
    public function exchangeArray(array $array)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'exchangeArray', array($array));

        return parent::exchangeArray($array);
    }

    /**
     * {@inheritDoc}
     */
    public function getArrayCopy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getArrayCopy', array());

        return parent::getArrayCopy();
    }

    /**
     * {@inheritDoc}
     */
    public function hydrate(array $data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hydrate', array($data));

        return parent::hydrate($data);
    }

    /**
     * {@inheritDoc}
     */
    public function extract()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'extract', array());

        return parent::extract();
    }

    /**
     * {@inheritDoc}
     */
    public function validate($data = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'validate', array($data));

        return parent::validate($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessages', array());

        return parent::getMessages();
    }

    /**
     * {@inheritDoc}
     */
    public function getVF($name = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVF', array($name));

        return parent::getVF($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setVF($name, $value)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVF', array($name, $value));

        return parent::setVF($name, $value);
    }

}
