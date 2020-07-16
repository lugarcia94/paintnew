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

namespace B2W\SkyHub\Model\Map;

use B2W\SkyHub\Model\Entity\EntityAbstract;

/**
 * Class Attribute
 * @package B2W\SkyHub\Model\Map
 */
class MapAttribute extends EntityAbstract
{
    /**
     * @var null
     */
    protected $_skyhub      = null;
    /**
     * @var null
     */
    protected $_wordpress   = null;
    /**
     * @var array
     */
    protected $_mapper      = array();
    /**
     * @var null
     */
    protected $label        = null;
    /**
     * @var bool
     */
    protected $_showInAdmin = true;

    /**
     * @return bool
     */
    public function canShowInAdmin()
    {
        return $this->_showInAdmin;
    }

    /**
     * @param $showInAdmin
     * @return $this
     */
    public function setShowInAdmin($showInAdmin)
    {
        $this->_showInAdmin = $showInAdmin;
        return $this;
    }

    /**
     * @return null
     */
    public function getSkyhub()
    {
        return $this->_skyhub;
    }

    /**
     * @param $skyhub
     * @return $this
     */
    public function setSkyhub($skyhub)
    {
        $this->_skyhub = $skyhub;
        return $this;
    }

    /**
     * @return null
     */
    public function getWordpress()
    {
        return $this->_wordpress;
    }

    /**
     * @param $wordpress
     * @return $this
     */
    public function setWordpress($wordpress)
    {
        $this->_wordpress = $wordpress;
        return $this;
    }

    /**
     * @return null
     */
    public function getMapper($key = null)
    {
        if ($key) {
            return isset($this->_mapper[$key]) ? $this->_mapper[$key] : false;
        }

        return $this->_mapper;
    }

    /**
     * @param $mapper
     * @return $this
     */
    public function setMapper($mapper)
    {
        if (!is_array($mapper)) {
            return $this;
        }

        $this->_mapper = $mapper;

        return $this;
    }

    /**
     * @return null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }
}
