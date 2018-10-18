<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Messenger\Transport;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @experimental in 4.1
 */
interface TransportInterface extends ReceiverInterface, SenderInterface
{
}
