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

class MbStringValue extends AbstractString implements StringInterface
{
    /**
     * @var string
     */
    private $encoding;

    /**
     * @param string $value
     * @param string|null $encoding
     */
    public function __construct($value, $encoding = null)
    {
        if (!extension_loaded('mbstring')) {
            throw new \RuntimeException(
                'The mbstring extension must be loaded to use ' . __CLASS__
            );
        }

        parent::__construct($value);

        if (null === $encoding) {
            $encoding = mb_internal_encoding();
        }

        $this->encoding = $encoding;
    }

    /**
     * @param string $needle
     * @param bool $caseInsensitive
     * @return bool
     */
    public function startsWith($needle, $caseInsensitive = false)
    {
        $validNeedle = $this->checkString($needle, 2);

        if (0 === mb_strlen($validNeedle, $this->encoding)) {
            return true;
        }

        if ($caseInsensitive) {
            return 0 === mb_stripos((string) $this, $validNeedle, 0, $this->encoding);
        }

        return 0 === mb_strpos((string) $this, $validNeedle, 0, $this->encoding);
    }

    /**
     * @param string $needle
     * @param bool $caseInsensitive
     * @return bool
     */
    public function endsWith($needle, $caseInsensitive = false)
    {
        $validNeedle = $this->checkString($needle, 2);

        if (0 === mb_strlen($validNeedle, $this->encoding)) {
            return true;
        }

        $haystackEnd = mb_substr(
            (string) $this,
            mb_strlen($validNeedle, $this->encoding) * -1,
            null,
            $this->encoding
        );

        if ($caseInsensitive) {
            return 0 === mb_stripos($haystackEnd, $validNeedle, 0, $this->encoding);
        }

        return 0 === mb_strpos($haystackEnd, $validNeedle, 0, $this->encoding);
    }
}
