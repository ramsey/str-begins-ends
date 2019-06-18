<?php

namespace Ramsey\String\Test;

use PHPUnit_Framework_Error;

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
