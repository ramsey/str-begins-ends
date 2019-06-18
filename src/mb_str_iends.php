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

if (extension_loaded('mbstring') && !function_exists('mb_str_iends')) {
    /**
     * Checks if haystack ends with needle, case insensitive
     *
     * @param string $haystack
     * @param string $needle
     * @param string|null $encoding
     * @return bool
     */
    function mb_str_iends($haystack, $needle, $encoding = null)
    {
        $validHaystack = \Ramsey\String\testString($haystack, 1, __FUNCTION__);
        $validNeedle = \Ramsey\String\testString($needle, 2, __FUNCTION__);

        if (null === $encoding) {
            $encoding = mb_internal_encoding();
        }

        if (0 === mb_strlen($validNeedle, $encoding)) {
            return true;
        }

        $haystackEnd = mb_substr($validHaystack, mb_strlen($validNeedle, $encoding) * -1, null, $encoding);

        if (0 === mb_stripos($haystackEnd, $validNeedle, 0, $encoding)) {
            return true;
        }

        return false;
    }
}
