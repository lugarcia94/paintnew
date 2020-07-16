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

namespace B2W\SkyHub\Model\Transformer\Order\Invoice;

use B2W\SkyHub\Model\Entity\Order\InvoiceEntity;
use B2W\SkyHub\Model\Map\Order\InvoiceMap;
use B2W\SkyHub\Model\Resource\Collection;
use B2W\SkyHub\Model\Transformer\ApiToEntityAbstract;

/**
 * Class ApiToEntity
 * @package B2W\SkyHub\Model\Transformer\Order\Invoice
 */
class ApiToEntity extends ApiToEntityAbstract
{
    /**
     * @return InvoiceEntity|mixed
     */
    protected function _getEntityInstance()
    {
        return new InvoiceEntity();
    }

    /**
     * @return InvoiceMap|mixed
     */
    protected function _getMapInstance()
    {
        return new InvoiceMap();
    }

    /**
     * @return Collection|mixed|null
     * @throws \Exception
     */
    public function convert()
    {
        $collection = new Collection();
        $data       = $this->_prepareData();

        foreach ($data as $invoice) {
            $this->_entity      = new InvoiceEntity();
            $this->_response    = $invoice;
            $collection->addItem(parent::convert());
        }

        return $collection;
    }
}
