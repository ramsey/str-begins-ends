<?php

namespace Ramsey\String\Test\Functions;

use PHPUnit_Framework_Error;
use Ramsey\String\Test\TestCase;

class MbStrEndsTest extends TestCase
{
    protected function setUp()
    {
        if (!extension_loaded('mbstring')) {
            $this->markTestSkipped('skip mbstring not available');
        }
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_ends() expects parameter 1 to be string, object given
     */
    public function testMbStrEndsTriggersWarningForInvalidHaystack()
    {
        mb_str_ends(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_ends() expects parameter 2 to be string, object given
     */
    public function testMbStrEndsTriggersWarningForInvalidNeedle()
    {
        mb_str_ends('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @param $mainEncoding
     * @param $encodingParameter
     * @dataProvider mbStrEndsProvider
     */
    public function testMbStrEnds($haystack, $needle, $expected, $mainEncoding, $encodingParameter)
    {
        mb_internal_encoding($mainEncoding);

        $this->assertSame($expected, mb_str_ends($haystack, $needle, $encodingParameter));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_ends_with() expects parameter 1 to be string, object given
     */
    public function testMbStrEndsWithTriggersWarningForInvalidHaystack()
    {
        mb_str_ends_with(new \stdClass(), 'foo');
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage mb_str_ends_with() expects parameter 2 to be string, object given
     */
    public function testMbStrEndsWithTriggersWarningForInvalidNeedle()
    {
        mb_str_ends_with('foo', new \stdClass());
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $expected
     * @param $mainEncoding
     * @param $encodingParameter
     * @dataProvider mbStrEndsProvider
     */
    public function testMbStrEndsWith($haystack, $needle, $expected, $mainEncoding, $encodingParameter)
    {
        mb_internal_encoding($mainEncoding);

        $this->assertSame($expected, mb_str_ends_with($haystack, $needle, $encodingParameter));
    }

    public function mbStrEndsProvider()
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
            [$string_ascii, 'F', false, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'e', false, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, '', true, 'UTF-8', 'ISO-8859-1'],
            [$string_ascii, 'def', true, 'UTF-8', null],
            [$string_ascii, 'de', false, 'UTF-8', null],
            [$string_ascii, '', true, 'UTF-8', null],
            [$string_mb, base64_decode('77yZ44CC'), true, 'UTF-8', null],
            [$string_mb, base64_decode('44GT44KT44Gr44Gh44Gv44CB5LiW55WM'), false, 'UTF-8', null],
            [$string_mb, '', true, 'UTF-8', null],
            ['Τὴ γλῶσσα μοῦ ἔδωσαν ἑλληνικὴ', 'ἙΛΛΗΝΙΚῊ', false, 'UTF-8', null],
        ];
    }
}
