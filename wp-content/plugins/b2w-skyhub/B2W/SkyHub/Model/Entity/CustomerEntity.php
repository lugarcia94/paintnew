<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2017 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Luiz Tucillo <luiz.tucillo@e-smart.com.br>
 */

namespace B2W\SkyHub\Model\Entity;

class CustomerEntity extends EntityAbstract implements \B2W\SkyHub\Contract\Entity\CustomerEntityInterface
{
    /** @var int */
    protected $_id                  = null;
    /** @var string */
    protected $_name                = null;
    /** @var string */
    protected $_email               = null;
    /** @var \DateTime|string */
    protected $_dateOfBirth       = null;
    /** @var string */
    protected $_gender              = null;
    /** @var string */
    protected $_vatNumber          = null;
    /** @var array */
    protected $_phones              = null;
    /** @var string */
    protected $_stateRegistration  = null;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->_dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->_dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return string
     */
    public function getVatNumber()
    {
        return $this->_vatNumber;
    }

    /**
     * @param string $vatNumber
     */
    public function setVatNumber($vatNumber)
    {
        $this->_vatNumber = $vatNumber;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->_phones;
    }

    /**
     * @param array $phones
     */
    public function setPhones($phones)
    {
        $this->_phones = $phones;
    }

    /**
     * @return string
     */
    public function getStateRegistration()
    {
        return $this->_stateRegistration;
    }

    /**
     * @param string $stateRegistration
     */
    public function setStateRegistration($stateRegistration)
    {
        $this->_stateRegistration = $stateRegistration;
    }
}
