<?php

namespace Walls\DtoBundle\Test\Service\Extjs;

use Walls\DtoBundle\Service\Extjs\ExtjsDtoHandler;
use Walls\DtoBundle\Tests\Fixtures\Person;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-11-08 at 06:42:42.
 */
class ExtjsDtoHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ExtjsDtoHandler
     */
    protected $handler;

    protected function setUp()
    {
        $this->handler = new ExtjsDtoHandler;
    }

    protected function tearDown()
    {
        unset($this->handler);
    }

    /**
     * @covers Walls\DtoBundle\Service\Extjs\ExtjsDtoHandler::wrapData
     */
    public function testWrapPrimitiveTypeDatum()
    {
        $data = 'hello';

        $dto = $this->handler->wrapData($data);

        $expected = array('hello');
        $actual   = $dto->getData();

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Walls\DtoBundle\Service\Extjs\ExtjsDtoHandler::wrapData
     */
    public function testWrapPrimitiveTypeData()
    {
        $data = array('foo', 'bar');

        $dto = $this->handler->wrapData($data);

        // result should be in data[] not data[array()]
        $expected = $data;
        $actual   = $dto->getData();

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Walls\DtoBundle\Service\Extjs\ExtjsDtoHandler::wrapData
     */
    public function testWrapObjectDatum()
    {
        $data = new Person('Me');

        $dto = $this->handler->wrapData($data);

        $expected = array($data);
        $actual   = $dto->getData();

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Walls\DtoBundle\Service\Extjs\ExtjsDtoHandler::wrapMessage
     */
    public function testWrapMessage()
    {
        $message = 'hello';
        
        $dto = $this->handler->wrapMessage($message);
        
        $expected = 'hello';
        $actual = $dto->getMessage();
        
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers Walls\DtoBundle\Service\Extjs\ExtjsDtoHandler::wrapException
     */
    public function testWrapExceptionMessage()
    {
        $exception = new \Exception('hello');
        
        $dto = $this->handler->wrapException($exception);
        
        $expected = $exception->getMessage();
        $actual = $dto->getMessage();
        
        $this->assertEquals($expected, $actual);
    }
}
