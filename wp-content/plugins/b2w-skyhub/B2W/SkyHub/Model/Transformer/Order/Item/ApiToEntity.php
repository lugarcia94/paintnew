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

namespace B2W\SkyHub\Model\Transformer\Order\Item;

use B2W\SkyHub\Model\Entity\Order\ItemEntity;
use B2W\SkyHub\Model\Resource\Collection;
use B2W\SkyHub\Model\Transformer\ApiToEntityAbstract;

/**
 * Class DbToEntity
 * @package B2W\SkyHub\Model\Transformer\Order\Item
 */
class ApiToEntity extends ApiToEntityAbstract
{
    /**
     * @return mixed|null
     */
    protected function _getEntityInstance()
    {
        return null;
    }

    /**
     * @return mixed|null
     */
    protected function _getMapInstance()
    {
        return null;
    }

    public function convert()
    {
        $collection = new Collection();

        foreach ($this->_prepareData() as $data) {

            $product = $this->_getProduct($data['id']);

            if (!$product) {
                continue;
            }

            $item = new ItemEntity();
            $item->setId($data['id']);
            $item->setName($data['name']);
            $item->setProduct($product);
            $item->setOriginalPrice($data['original_price']);
            $item->setSpecialPrice($data['special_price']);
            $item->setShippingCost($data['shipping_cost']);
            $item->setQty($data['qty']);

            $collection->addItem($item);
        }

        return $collection;
    }

    /**
     * @param $id
     * @return bool|mixed|null
     * @throws \B2W\SkyHub\Exception\Data\RepositoryNotFound
     */
    protected function _getProduct($id)
    {

        $product = \App::repository(\App::REPOSITORY_PRODUCT)->sku($id);

        // if product is empty try variation
        if (!$product) {
            /** @var \B2W\SkyHub\Contract\Entity\Product\VariationEntityInterface $variation */
            $variation = \App::repository(\App::REPOSITORY_PRODUCT_VARIATION)->sku($id);

            if ($variation) {
                return $variation->getParent();
            }
        }

        return $product;
    }
}
