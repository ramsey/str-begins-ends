<?php

namespace Ramsey\String\Test\Functions;

use PHPUnit_Framework_Error;
use Ramsey\String\Test\TestCase;

class MbStrBeginsTest extends TestCase
{
    protected function setUp()
    {
        if (!extension_loaded('mbstring')) {
            $this->markTestSkipped('skip mbstring not available');
        }
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_begins() expects parameter 1 to be string, object given
     */
    public function testMbStrBeginsTriggersWarningForInvalidHaystack()
    {
        mb_str_begins(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_begins() expects parameter 2 to be string, object given
     */
    public function testMbStrBeginsTriggersWarningForInvalidNeedle()
    {
        mb_str_begins('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @param $mainEncoding
     * @param $encodingParameter
     * @dataProvider mbStrBeginsProvider
     */
    public function testMbStrBegins($haystack, $needle, $expected, $mainEncoding, $encodingParameter)
    {
        mb_internal_encoding($mainEncoding);

        $this->assertSame($expected, mb_str_begins($haystack, $needle, $encodingParameter));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_starts_with() expects parameter 1 to be string, object given
     */
    public function testMbStrStartsWithTriggersWarningForInvalidHaystack()
    {
        mb_str_starts_with(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_starts_with() expects parameter 2 to be string, object given
     */
    public function testMbStrStartsWithTriggersWarningForInvalidNeedle()
    {
        mb_str_starts_with('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @param $mainEncoding
     * @param $encodingParameter
     * @dataProvider mbStrBeginsProvider
     */
    public function testMbStrStartsWith($haystack, $needle, $expected, $mainEncoding, $encodingParameter)
    {
        mb_internal_encoding($mainEncoding);

        $this->assertSame($expected, mb_str_starts_with($haystack, $needle, $encodingParameter));
    }

    public function mbStrBeginsProvider()
    {
        $euc_jp = '0123この文字列は日本語です。EUC-JPを使っています。0123日本語は面倒臭い。';
        $string_ascii = 'abc def';
        $string_mb = base64_decode('5pel5pys6Kqe44OG44Kt44K544OI44Gn44GZ44CCMDEyMzTvvJXvvJbvvJfvvJjvvJnjgII=');

        return [
            [$euc_jp, '0123こ', true, 'UTF-8', 'EUC-JP'],
            [$euc_jp, '韓国語', false, 'UTF-8', 'EUC-JP'],
            [$euc_jp, '0123', true, 'EUC-JP', null],
            [$euc_jp, '韓国語', false, 'EUC-JP', null],
            [$euc_jp, '', true, 'UTF-8', 'EUC-JP'],
            [$string_ascii, 'a', true, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'A', false, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'b', false, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, '', true, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'abc', true, 'UTF-8', null],
            [$string_ascii, 'bc', false, 'UTF-8', null],
            [$string_ascii, '', true, 'UTF-8', null],
            [$string_mb, base64_decode('5pel5pys6Kqe'), true, 'UTF-8', null],
            [$string_mb, base64_decode('44GT44KT44Gr44Gh44Gv44CB5LiW55WM'), false, 'UTF-8', null],
            [$string_mb, '', true, 'UTF-8', null],
            ['Τὴ γλῶσσα μοῦ ἔδωσαν ἑλληνικὴ', 'ΤῊ', false, 'UTF-8', null],
        ];
    }
}
