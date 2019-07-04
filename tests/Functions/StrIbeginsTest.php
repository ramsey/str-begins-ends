<?php

namespace Ramsey\String\Test\Functions;

use PHPUnit_Framework_Error;
use Ramsey\String\Test\TestCase;

class StrIbeginsTest extends TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ibegins() expects parameter 1 to be string, object given
     */
    public function testStrIbeginsTriggersWarningForInvalidHaystack()
    {
        str_ibegins(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_ibegins() expects parameter 2 to be string, object given
     */
    public function testStrIbeginsTriggersWarningForInvalidNeedle()
    {
        str_ibegins('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strIbeginsProvider
     */
    public function testStrIbegins($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_ibegins($haystack, $needle));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_starts_with_ci() expects parameter 1 to be string, object given
     */
    public function testStrStartsWithCiTriggersWarningForInvalidHaystack()
    {
        str_starts_with_ci(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage str_starts_with_ci() expects parameter 2 to be string, object given
     */
    public function testStrStartsWithCiTriggersWarningForInvalidNeedle()
    {
        str_starts_with_ci('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @dataProvider strIbeginsProvider
     */
    public function testStrStartsWithCi($haystack, $needle, $expected)
    {
        $this->assertSame($expected, str_starts_with_ci($haystack, $needle));
    }

    public function strIbeginsProvider()
    {
        $testStr = 'beginningMiddleEnd';

        return [
            [$testStr, 'beginning', true],
            [$testStr, 'beginningMiddleEnd', true],
            [$testStr, 'Beginning', true],
            [$testStr, 'BEGINNING', true],
            [$testStr, 'BEGINNINGMIDDLEEND', true],
            [$testStr, 'eginning', false],
            [$testStr, 'beginningMiddleEndAndMore', false],
            [$testStr, '', true],
        ];
    }
}
