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

abstract class AbstractString implements StringInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $this->checkString($value, 1);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * @param mixed $value
     * @param int $position
     * @return StringValue
     */
    protected function checkString($value, $position)
    {
        if (is_scalar($value) || (is_object($value) && method_exists($value, '__toString'))) {
            return strval($value);
        }

        throw new InvalidStringArgumentException($value, $position);
    }
}
