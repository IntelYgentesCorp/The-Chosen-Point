<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Messenger\ArrivalZone;

class AddArrivalZoneCommand
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var null|string
     */
    private $description;

    /**
     * AddArrivalZoneCommand constructor.
     */
    public function __construct(string $name, ?string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
