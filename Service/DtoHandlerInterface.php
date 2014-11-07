<?php

namespace Walls\DtoBundle\Service;

// association
use Walls\DtoBundle\Entity\DtoInterface;
/**
 * Interface for DTO Handler
 * 
 * @package Walls
 * @subpackage DtoBundle
 * @author Tee Tanawatanakul <wallsfantasy@gmail.com>
 */
interface DtoHandlerInterface
{

    /**
     * Wrap data objects
     * 
     * @param object[]  $data   record(s) of data
     * @param integer   $total  total number of records
     * @return DtoInterfae
     */
    public function wrapData($data, $total = null, $message = 'OK');

    /**
     * Wrap a message
     * 
     * @param string        $message
     * @param boolean|null  $success
     * @return DtoInterfae
     */
    public function wrapMessage($message, $success = null);

    /**
     * Wrap an exception
     * 
     * @param Exception $e
     * @param boolean $success
     * @return DtoInterfae
     */
    public function wrapException(\Exception $e, $success = false);
}
