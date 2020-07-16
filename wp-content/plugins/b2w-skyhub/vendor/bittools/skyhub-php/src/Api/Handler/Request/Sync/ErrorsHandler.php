<?php
/**
 * B2W Digital - Companhia Digital
 *
 * Do not edit this file if you want to update this SDK for future new versions.
 * For support please contact the e-mail bellow:
 *
 * sdk@e-smart.com.br
 *
 * @category  SkuHub
 * @package   SkuHub
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br).
 *
 * @author    Tiago Sampaio <tiago.sampaio@e-smart.com.br>
 */

namespace SkyHub\Api\Handler\Request\Sync;

use SkyHub\Api\Handler\Request\HandlerAbstract;

class ErrorsHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/sync_errors';


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function categoriesErrors()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('categories'));
        return $responseHandler;
    }


    /**
     * @param string $categoryCode
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function categoryErrors($categoryCode)
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath("categories/{$categoryCode}"));
        return $responseHandler;
    }


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function productsErrors()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('products'));
        return $responseHandler;
    }


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function ordersErrors()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('orders'));
        return $responseHandler;
    }


    /**
     * @todo It needs to be wrapped up.
     *
     * @var array $errors
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function ignoreProductErrors(
        array $errors = [
            ['entity_id' => null, 'error_category_code' => null, 'error_code' => null]
        ]
    ) {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->patch($this->baseUrlPath('products'));
        return $responseHandler;
    }


    /**
     * @todo It needs to be wrapped up.
     *
     * @var array $errors
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function ignoreOrderErrors(
        array $errors = [
            ['entity_id' => null, 'error_category_code' => null, 'error_code' => null]
        ]
    ) {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->patch($this->baseUrlPath('orders'));
        return $responseHandler;
    }


    /**
     * @return null
     */
    public function entityInterface()
    {
        return null;
    }
}
