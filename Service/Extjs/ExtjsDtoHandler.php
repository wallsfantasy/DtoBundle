<?php

namespace Walls\DtoBundle\Service\Extjs;

// inheritance
use Walls\DtoBundle\Service\DtoHandlerInterface;
// associations
use Walls\DtoBundle\Entity\Extjs\ExtjsDto;

/**
 * DTO wrapper for ExtJs
 *
 * @package Walls
 * @subpackage DtoBundle
 * @author Tee Tanawatanakul <wallsfantasy@gmail.com>
 */
class ExtjsDtoHandler implements DtoHandlerInterface
{
    /**
     * Wrap entities
     * 
     * @param object[]      $data
     * @param integer|null  $total
     * @param string|null   $message
     * @return ExtjsDto
     */
    public function wrapData($data, $total = null, $message = 'OK')
    {
        return new ExtjsDto(true, $message, $data, $total);
    }

    /**
     * Wrap message
     * 
     * @param string        $message
     * @param boolean|null  $success
     * @return ExtjsDto
     */
    public function wrapMessage($message, $success = null)
    {
        return new ExtjsDto($success, $message);
    }

    /**
     * Wrap exception
     * 
     * @param \Exception    $e
     * @param boolean|null  $success
     * @return ExtjsDto
     */
    public function wrapException(\Exception $e, $success = false)
    {
        $dto = new ExtjsDto($success);
        $dto->setException($e);
        return $dto;
    }

}
