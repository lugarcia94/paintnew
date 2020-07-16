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

namespace B2W\SkyHub\Model\Transformer\Order;

use B2W\SkyHub\Model\Entity\OrderEntity;
use B2W\SkyHub\Model\Map\OrderMap;
use B2W\SkyHub\Model\Transformer\DbToEntityAbstract;

/**
 * Class DbToEntity
 * @package B2W\SkyHub\Model\Transformer\Order
 */
class DbToEntity extends DbToEntityAbstract
{
    /**
     * @return array|mixed
     */
    protected function _getAttributeMap()
    {
        $map = new OrderMap();
        return $map->map();
    }

    /**
     * @return OrderEntity|null
     */
    public function _getEntityInstance()
    {
        return new OrderEntity();
    }
}
