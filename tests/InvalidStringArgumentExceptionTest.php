<?php

namespace Ramsey\String\Test;

use InvalidArgumentException;
use Ramsey\String\InvalidStringArgumentException;

class InvalidStringArgumentExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage $argumentPosition must be an integer
     */
    public function testConstructorThrowsExceptionWhenArgumentPositionIsNotAnInteger()
    {
        new InvalidStringArgumentException(new \stdClass(), 'baz');
    }

    public function testGetArgumentReturnsThePassedArgument()
    {
        $object = new \stdClass();
        $e = new InvalidStringArgumentException($object);

        $this->assertSame($object, $e->getArgument());
    }

    public function testGetArgumentTypeReturnsTheArgumentType()
    {
        $object = new \stdClass();
        $e = new InvalidStringArgumentException($object);

        $this->assertSame('object', $e->getArgumentType());
    }

    public function testExceptionMessage()
    {
        $object = new \stdClass();
        $e = new InvalidStringArgumentException($object);

        $this->assertSame('Expected a string; received object', $e->getMessage());
    }

    public function testGetArgumentPosition()
    {
        $object = new \stdClass();
        $e = new InvalidStringArgumentException($object, 3);

        $this->assertSame(3, $e->getArgumentPosition());
    }
}
