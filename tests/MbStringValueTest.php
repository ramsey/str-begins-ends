<?php

namespace Ramsey\String\Test;

use phpmock\mockery\PHPMockery;
use Ramsey\String\MbStringValue;
use RuntimeException;

class MbStringValueTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @expectedException RuntimeException
     * @expectedExceptionMessage The mbstring extension must be loaded to use Ramsey\String\MbStringValue
     */
    public function testConstructorThrowsExceptionWhenMbstringExtensionNotLoaded()
    {
        PHPMockery::mock('Ramsey\\String', 'extension_loaded')
            ->with('mbstring')
            ->andReturn(false);

        new MbStringValue('foo');
    }
}
