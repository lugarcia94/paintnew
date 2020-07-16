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

namespace B2W\SkyHub\Model\Map\Order;


use B2W\SkyHub\Model\Map\MapAbstract;

/**
 * Class ShipmentMap
 * @package B2W\SkyHub\Model\Map\Order
 */
class ShipmentMap extends MapAbstract
{
    /**
     * @return string
     */
    protected function _getConfigPath()
    {
        return 'map/order/shipment';
    }

    /**
     * @return null|string
     */
    protected function _getOptionsName()
    {
        return null;
    }
}
