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

if (extension_loaded('mbstring') && !function_exists('mb_str_starts_with')) {
    /**
     * Checks if haystack begins with needle
     *
     * @param string $haystack
     * @param string $needle
     * @param string|null $encoding
     * @return bool
     */
    function mb_str_starts_with($haystack, $needle, $encoding = null)
    {
        try {
            return (new \Ramsey\String\MbStringValue($haystack, $encoding))->startsWith($needle);
        } catch (\Ramsey\String\InvalidStringArgumentException $e) {
            \Ramsey\String\emitWarning(__FUNCTION__, $e);
        }

        // @codeCoverageIgnoreStart
    }

    // @codeCoverageIgnoreEnd
}

if (extension_loaded('mbstring') && !function_exists('mb_str_begins')) {
    /**
     * Checks if haystack begins with needle
     *
     * @param string $haystack
     * @param string $needle
     * @param string|null $encoding
     * @return bool
     * @deprecated
     */
    function mb_str_begins($haystack, $needle, $encoding = null)
    {
        try {
            return (new \Ramsey\String\MbStringValue($haystack, $encoding))->startsWith($needle);
        } catch (\Ramsey\String\InvalidStringArgumentException $e) {
            \Ramsey\String\emitWarning(__FUNCTION__, $e);
        }

        // @codeCoverageIgnoreStart
    }

    // @codeCoverageIgnoreEnd
}
