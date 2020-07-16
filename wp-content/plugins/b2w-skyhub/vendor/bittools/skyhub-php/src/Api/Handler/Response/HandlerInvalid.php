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

namespace SkyHub\Api\Handler\Response;

class HandlerInvalid extends HandlerAbstract
{
    
    /**
     * @return bool
     */
    public function success()
    {
        return false;
    }
    
    
    /**
     * @return bool
     */
    public function exception()
    {
        return false;
    }
    
    
    /**
     * @return bool
     */
    public function invalid()
    {
        return true;
    }
    
    
    /**
     * @return array
     */
    public function export()
    {
        return [];
    }
}
