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

class StringValue extends AbstractString implements StringInterface
{
    /**
     * @param string $needle
     * @param bool $caseInsensitive
     * @return bool
     */
    public function startsWith($needle, $caseInsensitive = false)
    {
        $validNeedle = $this->checkString($needle, 2);

        if (0 === strlen($validNeedle)) {
            return true;
        }

        if ($caseInsensitive) {
            return 0 === stripos((string) $this, $validNeedle);
        }

        return 0 === strpos((string) $this, $validNeedle);
    }

    /**
     * @param string $needle
     * @param bool $caseInsensitive
     * @return bool
     */
    public function endsWith($needle, $caseInsensitive = false)
    {
        $validNeedle = $this->checkString($needle, 2);

        if (0 === strlen($validNeedle)) {
            return true;
        }

        $haystackEnd = substr((string) $this, strlen($validNeedle) * -1);

        if ($caseInsensitive) {
            return 0 === stripos($haystackEnd, $validNeedle);
        }

        return 0 === strpos($haystackEnd, $validNeedle);
    }
}
