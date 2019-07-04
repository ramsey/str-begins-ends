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

if (!function_exists('str_starts_with')) {
    /**
     * Checks if haystack begins with needle
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    function str_starts_with($haystack, $needle)
    {
        try {
            return (new \Ramsey\String\StringValue($haystack))->startsWith($needle);
        } catch (\Ramsey\String\InvalidStringArgumentException $e) {
            \Ramsey\String\emitWarning(__FUNCTION__, $e);
        }

        // @codeCoverageIgnoreStart
    }

    // @codeCoverageIgnoreEnd
}

if (!function_exists('str_begins')) {
    /**
     * Checks if haystack begins with needle
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     * @deprecated
     */
    function str_begins($haystack, $needle)
    {
        try {
            return (new \Ramsey\String\StringValue($haystack))->startsWith($needle);
        } catch (\Ramsey\String\InvalidStringArgumentException $e) {
            \Ramsey\String\emitWarning(__FUNCTION__, $e);
        }

        // @codeCoverageIgnoreStart
    }

    // @codeCoverageIgnoreEnd
}
