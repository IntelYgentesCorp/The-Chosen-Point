<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Messenger\Middleware;

use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;

/**
 * @author Samuel Roze <samuel.roze@gmail.com>
 */
class AllowNoHandlerMiddleware implements MiddlewareInterface
{
    public function handle($message, callable $next)
    {
        try {
            return $next($message);
        } catch (NoHandlerForMessageException $e) {
            // We allow not having a handler for this message.
        }
    }
}
