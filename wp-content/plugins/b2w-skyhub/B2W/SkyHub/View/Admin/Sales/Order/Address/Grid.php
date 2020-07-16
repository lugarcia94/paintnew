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

namespace B2W\SkyHub\View\Admin\Sales\Order\Address;

use B2W\SkyHub\Model\Map\Order\AddressMap;
use B2W\SkyHub\View\Admin\Admin;
use B2W\SkyHub\View\Admin\GridAttributeAbstract;

/**
 * Class Attribute
 * @package B2W\SkyHub\View\Admin\Catalog\Product
 */
class Grid extends GridAttributeAbstract
{
    /**
     * @return AddressMap
     */
    public function _getMap()
    {
        return new AddressMap();
    }

    /**
     * @return string
     */
    public function _getEditSlug()
    {
        return Admin::SLUG_SALES_ORDER_ADDRESS_ATTRIBUTE_EDIT;
    }
}
