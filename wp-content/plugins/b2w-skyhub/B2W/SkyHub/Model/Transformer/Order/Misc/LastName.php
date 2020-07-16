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

namespace B2W\SkyHub\Model\Transformer\Order\Misc;

use B2W\SkyHub\Model\Transformer\EntityToDbAbstract;

/**
 * Class LastName
 * @package B2W\SkyHub\Model\Transformer\Order\Misc
 */
class LastName extends EntityToDbAbstract
{
    /**
     * @return mixed|null
     */
    protected function _getMapInstance()
    {
        return null;
    }

    /**
     * @return EntityToDbAbstract|string
     */
    public function convert()
    {
        $result     = array();
        $name       = explode(' ', $this->getEntity()->getCustomer()->getName());
        $nameCount  = count($name);
        $counter    = ceil($nameCount / 2);

        for ($i = $counter; $i < $nameCount; $i ++) {
            $result[] = $name[$i];
        }

        return implode(' ', $result);
    }
}
