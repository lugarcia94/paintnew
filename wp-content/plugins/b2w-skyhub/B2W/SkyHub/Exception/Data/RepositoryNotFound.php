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

namespace B2W\SkyHub\Exception\Data;

use B2W\SkyHub\Exception\Exception;
use Throwable;

/**
 * Class RepositoryNotFound
 * @package B2W\SkyHub\Exception\Data
 */
class RepositoryNotFound extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Repository %s not found';

    /**
     * RepositoryNotFound constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf($this->message, $message), $code, $previous);
    }
}
