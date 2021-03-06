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

namespace B2W\SkyHub\Contract\Repository;

use B2W\SkyHub\Contract\Entity\OrderEntityInterface;

/**
 * Interface OrderDbRepositoryInterface
 * @package B2W\SkyHub\Contract\Repository
 */
interface OrderDbRepositoryInterface
{
    /**
     * @param $filter
     * @return mixed
     */
    public function find($filter);

    /**
     * @param $post
     * @return mixed
     */
    public function one($post);

    /**
     * @param $code
     * @return mixed
     */
    public function code($code);

    /**
     * @param OrderEntityInterface $order
     * @return mixed
     */
    public function save(OrderEntityInterface $order);
}
