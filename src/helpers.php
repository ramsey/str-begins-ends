<?php
/**
 * This file is part of the ramsey/str-begins-ends library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace Ramsey\String;

/**
 * Test a value for string conversion and raise a warning if it can't be converted.
 *
 * @param mixed $value The value to test.
 * @param int $parameterIndex The position at which the value was passed to the calling function.
 * @param string $functionName The name of the calling function.
 * @return string|bool The converted string value or false (with a warning) if cannot convert.
 */
function testString($value, $parameterIndex, $functionName)
{
    if (is_scalar($value) || (is_object($value) && method_exists($value, '__toString'))) {
        return strval($value);
    }

    $errorMessage = sprintf(
        '%s() expects parameter %d to be string, %s given',
        $functionName,
        $parameterIndex,
        gettype($value)
    );

    trigger_error($errorMessage, E_USER_WARNING);

    // @codeCoverageIgnoreStart
}
