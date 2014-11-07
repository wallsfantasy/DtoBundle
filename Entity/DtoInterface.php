<?php

namespace Walls\DtoBundle\Entity;

/**
 * Interface for DTO
 * 
 * @package Walls
 * @subpackage DtoBundle
 * @author Tee Tanawatanakul <wallsfantasy@gmail.com>
 */
interface DtoInterface
{
    /**
     * Set data inside DTO
     * @param mixed $data
     */
    public function setData($data);
    
    /**
     * Set exception
     * @param \Exception $exception
     */
    public function setException(\Exception $exception);
}
