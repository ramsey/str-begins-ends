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

function emitWarning($functionName, InvalidStringArgumentException $exception)
{
    $errorMessage = sprintf(
        '%s() expects parameter %d to be string, %s given',
        $functionName,
        $exception->getArgumentPosition(),
        $exception->getArgumentType()
    );

    trigger_error($errorMessage, E_USER_WARNING);

    // @codeCoverageIgnoreStart
}

// @codeCoverageIgnoreEnd
