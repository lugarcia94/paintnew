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

namespace SkyHub\Api\Log;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;
use SkyHub\Api\Log\TypeInterface\TypeRequestInterface;
use SkyHub\Api\Log\TypeInterface\TypeResponseInterface;

class Logger extends LoggerAbstract
{
    
    /** @var bool */
    protected $allowLogs = false;
    
    /** @var bool */
    protected $initialized = false;
    
    /** @var string */
    protected $name = null;
    
    /** @var string */
    protected $filename = null;
    
    /** @var string */
    protected $logPath = null;
    
    /** @var string */
    protected $level = null;
    
    /** @var MonologLogger */
    protected $logger = null;
    
    
    /**
     * Logger constructor.
     *
     * @param string $name
     * @param string $filename
     * @param string $filepath
     * @param int    $level
     */
    public function __construct($name, $logPath, $filename = null, $level = MonologLogger::DEBUG, $allowLogs = true)
    {
        $this->name     = $name;
        $this->filename = $filename;
        $this->logPath  = $logPath;
        $this->level    = $level;
    
        $this->allowLogs($allowLogs);
    }
    
    
    /**
     * @return $this
     */
    public function init()
    {
        if (true === $this->initialized) {
            return $this;
        }
        
        $this->logger = new MonologLogger($this->name);
        
        $streamHandler = new StreamHandler($this->logFilename($this->filename, $this->logPath), $this->level);
        $this->logger->pushHandler($streamHandler);
    
        $this->initialized = true;
        
        return $this;
    }
    
    
    /**
     * @param string $filename
     * @param string $filePath
     *
     * @return string
     */
    protected function logFilename($filename, $filePath)
    {
        $filePath = trim(rtrim($filePath, "\/"));
        $filename = trim(trim($filename, "\/"));
        
        $path = $filePath . DIRECTORY_SEPARATOR . $filename;
        
        if (!realpath($path) || !file_exists($path)) {
            touch($path);
        }
        
        return realpath($path);
    }
    
    
    /**
     * @param TypeRequestInterface $request
     *
     * @return $this|mixed
     */
    public function logRequest(TypeRequestInterface $request)
    {
        if (!$this->isLogsAllowed()) {
            return $this;
        }

        $this->logger->log($this->level, (string) $request);
        
        return $this;
    }
    
    
    /**
     * @param TypeResponseInterface $response
     *
     * @return $this|mixed
     */
    public function logResponse(TypeResponseInterface $response)
    {
        if (!$this->isLogsAllowed()) {
            return $this;
        }
    
        $this->logger->debug((string) $response);
        
        return $this;
    }
    
    
    /**
     * @return bool
     */
    public function isLogsAllowed()
    {
        return (bool) $this->allowLogs;
    }
    
    
    /**
     * @param null|bool $flag
     *
     * @return $this
     */
    public function allowLogs($flag = true)
    {
        $this->allowLogs = (bool) $flag;
        
        if (true === $flag) {
            $this->init();
        }
        
        return $this;
    }
}
