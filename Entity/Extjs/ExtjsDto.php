<?php

namespace Walls\DtoBundle\Entity\Extjs;

// inheritance
use Walls\DtoBundle\Entity\DtoInterface;

/**
 * DTO for ExtJs
 *
 * @package Walls
 * @subpackage DtoBundle
 * @author Tee Tanawatanakul <wallsfantasy@gmail.com>
 */
class ExtjsDto implements DtoInterface
{
    /**
     * Success flag
     * 
     * @access private
     * @var boolean|null
     */
    private $success;

    /**
     * Message
     * 
     * @access private
     * @var string|null
     */
    private $message;

    /**
     * Total number of entity
     * 
     * @access private
     * @var integer|null
     */
    private $total;

    /**
     * Data (entity) to send
     * 
     * @access private
     * @var mixed[]|null
     */
    private $data;

    /**
     * Error description
     * 
     * @access private
     * @var array|null
     */
    private $error;

    /**
     * Stack trace
     * 
     * @access private
     * @var array|null
     */
    private $traces;
    
    /**
     * Previous exception
     * 
     * @access private
     * @var array|null
     */
    private $prevException;

    /**
     * Constructor
     * 
     * @param boolean|null  $success
     * @param string|null   $message
     * @param object[]|null $data
     * @param integer       $total
     */
    public function __construct($success = null, $message = null, $data = null,
            $total = null)
    {
        // initialize variables
        $this->message = (string) $message;

        // force $success to becomes boolean or null
        if ($success === null) {
            $this->success = null;
        } else {
            $this->success = (bool) $success;
        }

        // force $data to becomes array or null
        if ($data === null | is_array($data)) {
            $this->data = $data;
        } else {
            $this->data = array($data);
        }

        // force $total to becomes integer or null
        if ($total === null) {
            // auto total
            if ($this->data === null) {
                $this->total = null;
            } else {
                $this->total = count($this->data);
            }
        } else {
            $this->total = (int) $total;
        }
    }

    /**
     * Set success flag
     * 
     * @param boolean|null $bool
     */
    public function setSuccess($bool)
    {
        if ($bool === null) {
            $this->success = null;
        } else {
            $this->success = (bool) $bool;
        }
    }

    /**
     * Is success flag
     * 
     * @param boolean|null
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * Set message
     * 
     * @param string|null $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     * 
     * @param string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set data
     * 
     * @param mixed[]|null $data
     */
    public function setData($data)
    {
        if ($data === null | is_array($data)) {
            $this->data  = $data;
            $this->total = count($data);
        } else {
            $this->data  = array($data);
            $this->total = 1;
        }
    }

    /**
     * Add data
     * 
     * @param mixed $data
     */
    public function addData($data)
    {
        if (!is_array($this->data)) {
            $this->data = array($data);
        } else {
            array_push($this->data, $data);
            $this->total = $this->total + 1;
        }
    }

    /**
     * Get data
     * 
     * @return mixed[]|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set number of entities
     * 
     * @param integer|null $total
     */
    public function setTotal($total)
    {
        if ($total === null) {
            $this->total = null;
        } else {
            $this->total = (int) $total;
        }
    }

    /**
     * Get number of entities
     * 
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set exception
     * 
     * @param \Exception $exception
     */
    public function setException(\Exception $exception)
    {
        $this->message       = $exception->getMessage();
        $this->error['code'] = $exception->getCode();
        $this->error['file'] = $exception->getFile();
        $this->error['line'] = $exception->getLine();
        
        $traces = $exception->getTrace();
        $length = count($traces);
        $elements = ['file', 'line', 'function', 'class', 'type'];
        for ($i = 0; $i < $length; $i++) {
            foreach ($elements as $key) {
                if(isset($traces[$i][$key])) {
                    $this->traces[$i][$key] = $traces[$i][$key];
                }
            }
        }
        
        $previous = $exception->getPrevious();
        if($previous !== null) {
            $this->prevException['class'] = get_class($previous);
            $this->prevException['message'] = $previous->getMessage();
            $this->prevException['code'] = $previous->getCode();
            $this->prevException['file'] = $previous->getFile();
            $this->prevException['line'] = $previous->getLine();
        }
    }
}
