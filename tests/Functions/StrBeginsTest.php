<?php

namespace Ramsey\String\Test\Functions;

use PHPUnit_Framework_Error;
use Ramsey\String\Test\TestCase;

class StrBeginsTest extends TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_begins() expects parameter 1 to be string, object given
     */
    public function testStrBeginsTriggersWarningForInvalidHaystack()
    {
        str_begins(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_begins() expects parameter 2 to be string, object given
     */
    public function testStrBeginsTriggersWarningForInvalidNeedle()
    {
        str_begins('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strBeginsProvider
     */
    public function testStrBegins($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_begins($haystack, $needle));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_starts_with() expects parameter 1 to be string, object given
     */
    public function testStrStartsWithTriggersWarningForInvalidHaystack()
    {
        str_starts_with(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_starts_with() expects parameter 2 to be string, object given
     */
    public function testStrStartsWithTriggersWarningForInvalidNeedle()
    {
        str_starts_with('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strBeginsProvider
     */
    public function testStrStartsWith($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_starts_with($haystack, $needle));
    }

    public function strBeginsProvider()
    {
        $testStr = 'beginningMiddleEnd';

        return [
            [$testStr, 'beginning', true],
            [$testStr, 'beginningMiddleEnd', true],
            [$testStr, 'Beginning', false],
            [$testStr, 'eginning', false],
            [$testStr, 'beginningMiddleEndAndMore', false],
            [$testStr, '', true],
        ];
    }
}
