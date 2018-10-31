<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Messenger\User;

class RegisterNewCarCommand
{
    /**
     * @var int
     */
    private $userId;
    /**
     * @var string
     */
    private $plate;

    public function __construct(int $userId, string $plate)
    {
        $this->userId = $userId;
        $this->plate = $plate;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getPlate(): string
    {
        return $this->plate;
    }
}
