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

namespace B2W\SkyHub\Model\Entity\Product;


use B2W\SkyHub\Model\Entity\EntityAbstract;
use B2W\SkyHub\Model\Entity\ProductEntity;
use B2W\SkyHub\Model\Resource\Collection;

/**
 * Class VariationEntity
 * @package B2W\SkyHub\Model\Entity\Product
 */
class VariationEntity extends EntityAbstract implements \B2W\SkyHub\Contract\Entity\Product\VariationEntityInterface
{
    /**
     * @var int
     */
    protected $_id              = null;
    /**
     * @var string
     */
    protected $_sku             = null;
    /**
     * @var int
     */
    protected $_qty             = null;
    /**
     * @var string
     */
    protected $_ean             = null;
    /**
     * @var array
     */
    protected $_images          = null;
    /**
     * @var Collection
     */
    protected $_specifications  = null;
    /**
     * @var ProductEntity
     */
    protected $_parent          = null;
    /**
     * @var int
     */
    protected $_parentId = null;
    /**
     * @var float
     */
    protected $_price = null;

    /**
     * @param \B2W\SkyHub\Contract\Entity\ProductEntityInterface $product
     * @return $this|mixed
     */
    public function setParent(\B2W\SkyHub\Contract\Entity\ProductEntityInterface $product)
    {
        $this->_parent = $product;
        return $this;
    }

    /**
     * @return ProductEntity|mixed
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    public function getParent()
    {
        if (is_null($this->_parent) && !empty($this->_parentId)) {
            $this->_parent = \App::repository(\App::REPOSITORY_PRODUCT)->one($this->_parentId);
        }

        return $this->_parent;
    }

    /**
     * @return int|mixed
     */
    public function getParentId()
    {
        if (empty($this->_parentId) && $this->_parent) {
            $this->_parentId = $this->_parent->getId();
        }

        return $this->_parentId;
    }

    /**
     * @param $parentId
     * @return mixed|void
     */
    public function setParentId($parentId)
    {
        $this->_parentId = $parentId;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getSku()
    {
        return $this->_sku;
    }

    /**
     * @param $sku
     * @return $this|mixed
     */
    public function setSku($sku)
    {
        $this->_sku = $sku;
        return $this;
    }

    /**
     * @return int|mixed
     */
    public function getQty()
    {
        return $this->_qty;
    }

    /**
     * @param $qty
     * @return $this|mixed
     */
    public function setQty($qty)
    {
        $this->_qty = $qty;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getEan()
    {
        return $this->_ean;
    }

    /**
     * @param $ean
     * @return $this|mixed
     */
    public function setEan($ean)
    {
        $this->_ean = $ean;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function getImages()
    {
        return $this->_images;
    }

    /**
     * @param $images
     * @return $this|mixed
     */
    public function setImages($images)
    {
        $this->_images = $images;
        return $this;
    }

    /**
     * @return Collection|mixed
     */
    public function getSpecifications()
    {
        return $this->_specifications;
    }

    /**
     * @param $specifications
     * @return $this|mixed
     */
    public function setSpecifications($specifications)
    {
        $this->_specifications = $specifications;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param null $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->_price = $price;
        return $this;
    }
}
