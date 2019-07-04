<?php

namespace Ramsey\String\Test\Functions;

use PHPUnit_Framework_Error;
use Ramsey\String\Test\TestCase;

class StrEndsTest extends TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ends() expects parameter 1 to be string, object given
     */
    public function testStrEndsTriggersWarningForInvalidHaystack()
    {
        str_ends(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ends() expects parameter 2 to be string, object given
     */
    public function testStrEndsTriggersWarningForInvalidNeedle()
    {
        str_ends('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strEndsProvider
     */
    public function testStrEnds($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_ends($haystack, $needle));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ends_with() expects parameter 1 to be string, object given
     */
    public function testStrEndsWithTriggersWarningForInvalidHaystack()
    {
        str_ends_with(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ends_with() expects parameter 2 to be string, object given
     */
    public function testStrEndsWithTriggersWarningForInvalidNeedle()
    {
        str_ends_with('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strEndsProvider
     */
    public function testStrEndsWith($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_ends_with($haystack, $needle));
    }

    public function strEndsProvider()
    {
        $testStr = 'beginningMiddleEnd';

        return [
            [$testStr, 'End', true],
            [$testStr, 'beginningMiddleEnd', true],
            [$testStr, 'end', false],
            [$testStr, 'en', false],
            [$testStr, 'beginningMiddleEndAndMore', false],
            [$testStr, '', true],
        ];
    }
}
