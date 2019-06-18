<?php

namespace Ramsey\String\Test;

use PHPUnit_Framework_Error;

class MbStrIendsTest extends TestCase
{
    protected function setUp()
    {
        if (!extension_loaded('mbstring')) {
            $this->markTestSkipped('skip mbstring not available');
        }
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_iends() expects parameter 1 to be string, object given
     */
    public function testMbStrIendsTriggersWarningForInvalidHaystack()
    {
        mb_str_iends(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_iends() expects parameter 2 to be string, object given
     */
    public function testMbStrIendsTriggersWarningForInvalidNeedle()
    {
        mb_str_iends('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @param $mainEncoding
     * @param $encodingParameter
     * @dataProvider mbStrIendsProvider
     */
    public function testMbStrIends($haystack, $needle, $expected, $mainEncoding, $encodingParameter)
    {
        mb_internal_encoding($mainEncoding);

        $this->assertSame($expected, mb_str_iends($haystack, $needle, $encodingParameter));
    }

    public function mbStrIendsProvider()
    {
        $euc_jp = '0123この文字列は日本語です。EUC-JPを使っています。0123日本語は面倒臭い。';
        $string_ascii = 'abc def';
        $string_mb = base64_decode('5pel5pys6Kqe44OG44Kt44K544OI44Gn44GZ44CCMDEyMzTvvJXvvJbvvJfvvJjvvJnjgII=');

        return [
            [$euc_jp, 'い。', true, 'UTF-8', 'EUC-JP'],
            [$euc_jp, '韓国語', false, 'UTF-8', 'EUC-JP'],
            [$euc_jp, 'い。', true, 'EUC-JP', null],
            [$euc_jp, '韓国語', false, 'EUC-JP', null],
            [$euc_jp, '', true, 'UTF-8', 'EUC-JP'],
            [$string_ascii, 'f', true, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'F', true, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'e', false, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, '', true, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'def', true, 'UTF-8', null],
            [$string_ascii, 'DeF', true, 'UTF-8', null],
            [$string_ascii, 'de', false, 'UTF-8', null],
            [$string_ascii, '', true, 'UTF-8', null],
            [$string_mb, base64_decode('77yZ44CC'), true, 'UTF-8', null],
            [$string_mb, base64_decode('44GT44KT44Gr44Gh44Gv44CB5LiW55WM'), false, 'UTF-8', null],
            [$string_mb, '', true, 'UTF-8', null],
            ['Τὴ γλῶσσα μοῦ ἔδωσαν ἑλληνικὴ', 'ἙΛΛΗΝΙΚῊ', true, 'UTF-8', null],
        ];
    }
}
