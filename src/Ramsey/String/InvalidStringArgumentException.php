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
 * Thrown when an argument is expected to be a string but a different type
 * of value is encountered.
 */
final class InvalidStringArgumentException extends \InvalidArgumentException
{
    /**
     * @var mixed
     */
    private $argument;

    /**
     * @var StringValue
     */
    private $argumentType;

    /**
     * @var int|null
     */
    private $argumentPosition;

    /**
     * @param mixed $argument The invalid argument that was expected to be a string.
     * @param int|null $argumentPosition The position of the invalid string
     *     argument in the throwing function or method.
     */
    public function __construct($argument, $argumentPosition = null)
    {
        if ($argumentPosition !== null && !preg_match('/^[0-9]+$/', $argumentPosition)) {
            throw new \InvalidArgumentException('$argumentPosition must be an integer');
        }

        $this->argument = $argument;
        $this->argumentType = gettype($argument);
        $this->argumentPosition = $argumentPosition;

        $message = sprintf(
            'Expected a string; received %s',
            $this->argumentType
        );

        parent::__construct($message);
    }

    /**
     * Returns the invalid argument.
     *
     * @return mixed
     */
    public function getArgument()
    {
        return $this->argument;
    }

    /**
     * Returns the data type of the argument.
     *
     * @return StringValue
     */
    public function getArgumentType()
    {
        return $this->argumentType;
    }

    /**
     * Returns the position of the argument in the throwing function or method.
     *
     * @return int|null
     */
    public function getArgumentPosition()
    {
        return $this->argumentPosition;
    }
}
