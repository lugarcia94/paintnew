<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Tiago Tescaro <tiago.tescaro@b2wdigital.com>
 */

namespace B2W\SkyHub\Model\Transformer\Order\Shipment\Track;

use B2W\SkyHub\Model\Entity\Order\Shipment\TrackEntity;
use B2W\SkyHub\Model\Map\Order\Shipment\TrackMap;
use B2W\SkyHub\Model\Transformer\DbToEntityAbstract;

class DbToEntity extends DbToEntityAbstract
{
    /**
     * @return Array
     */
    protected function _getAttributeMap()
    {
        $map = new TrackMap();
        return $map->map();
    }

    /**
     * @return TrackEntity
     */
    protected function _getEntityInstance()
    {
        return new TrackEntity();
    }
}
