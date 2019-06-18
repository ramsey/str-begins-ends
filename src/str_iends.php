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

if (!function_exists('str_iends')) {
    /**
     * Performs case insensitive check to determine if haystack ends with needle
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    function str_iends($haystack, $needle)
    {
        $validHaystack = \Ramsey\String\testString($haystack, 1, __FUNCTION__);
        $validNeedle = \Ramsey\String\testString($needle, 2, __FUNCTION__);

        if (0 === strlen($validNeedle)) {
            return true;
        }

        $haystackEnd = substr($validHaystack, strlen($validNeedle) * -1);

        if (stripos($haystackEnd, $validNeedle) === 0) {
            return true;
        }

        return false;
    }
}
