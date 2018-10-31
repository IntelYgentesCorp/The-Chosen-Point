<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Messenger\DepartureZone;

use App\Entity\DepartureZone;
use App\Repository\DepartureZoneRepository;

class AddDepartureZoneCommandHandler
{
    /**
     * @var DepartureZoneRepository
     */
    private $departureZoneRepository;

    public function __construct(DepartureZoneRepository $departureZoneRepository)
    {
        $this->departureZoneRepository = $departureZoneRepository;
    }

    public function __invoke(AddDepartureZoneCommand $command): DepartureZone
    {
        $departurezone = new DepartureZone();
        $departurezone->setName($command->getName());
        $departurezone->setDescription($command->getDescription());

        $this->departureZoneRepository->add($departurezone);

        return $departurezone;
    }
}
