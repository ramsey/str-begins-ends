<?php

namespace Ramsey\String\Test;

use PHPUnit_Framework_Error;

class HelpersTest extends TestCase
{
    public function testTestStringReturnsValueWhenValueIsString()
    {
        $this->assertSame(
            'some string',
            \Ramsey\String\testString('some string', 1, 'foobar')
        );
    }

    public function testTestStringReturnsStringValueOfObjectWithToString()
    {
        $object = new StringObject('my string object');

        $this->assertSame(
            'my string object',
            \Ramsey\String\testString($object, 1, 'foobar')
        );
    }

    public function testTestStringReturnsStringWhenValueIsTrue()
    {
        $this->assertSame(
            '1',
            \Ramsey\String\testString(true, 1, 'foobar')
        );
    }

    public function testTestStringReturnsEmptyStringWhenValueIsFalse()
    {
        $this->assertSame(
            '',
            \Ramsey\String\testString(false, 1, 'foobar')
        );
    }

    public function testTestStringReturnsStringWhenValueIsFloat()
    {
        $this->assertSame(
            '28.45678',
            \Ramsey\String\testString(28.45678, 1, 'foobar')
        );
    }

    public function testTestStringReturnsStringWhenValueIsInteger()
    {
        $this->assertSame(
            '1234567890',
            \Ramsey\String\testString(1234567890, 1, 'foobar')
        );
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage foobar() expects parameter 2 to be string, object given
     */
    public function testTestStringTriggersWarningWhenValueIsObject()
    {
        \Ramsey\String\testString(new \stdClass(), 2, 'foobar');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage barfoo() expects parameter 1 to be string, array given
     */
    public function testTestStringTriggersWarningWhenValueIsArray()
    {
        \Ramsey\String\testString([1, 2, 3, 4], 1, 'barfoo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage foo() expects parameter 3 to be string, resource given
     */
    public function testTestStringTriggersWarningWhenValueIsResource()
    {
        $value = fopen('php://memory', 'r');

        \Ramsey\String\testString($value, 3, 'foo');
    }
}
