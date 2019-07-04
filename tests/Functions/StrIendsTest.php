<?php

namespace Ramsey\String\Test\Functions;

use PHPUnit_Framework_Error;
use Ramsey\String\Test\TestCase;

class StrIendsTest extends TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_iends() expects parameter 1 to be string, object given
     */
    public function testStrIendsTriggersWarningForInvalidHaystack()
    {
        str_iends(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_iends() expects parameter 2 to be string, object given
     */
    public function testStrIendsTriggersWarningForInvalidNeedle()
    {
        str_iends('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strIendsProvider
     */
    public function testStrIends($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_iends($haystack, $needle));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ends_with_ci() expects parameter 1 to be string, object given
     */
    public function testStrEndsWithCiTriggersWarningForInvalidHaystack()
    {
        str_ends_with_ci(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ends_with_ci() expects parameter 2 to be string, object given
     */
    public function testStrEndsWithCiTriggersWarningForInvalidNeedle()
    {
        str_ends_with_ci('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strIendsProvider
     */
    public function testStrEndsWithCi($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_ends_with_ci($haystack, $needle));
    }

    public function strIendsProvider()
    {
        $testStr = 'beginningMiddleEnd';

        return [
            [$testStr, 'End', true],
            [$testStr, 'beginningMiddleEnd', true],
            [$testStr, 'end', true],
            [$testStr, 'END', true],
            [$testStr, 'BEGINNINGMIDDLEEND', true],
            [$testStr, 'en', false],
            [$testStr, 'beginningMiddleEndAndMore', false],
            [$testStr, '', true],
        ];
    }
}
