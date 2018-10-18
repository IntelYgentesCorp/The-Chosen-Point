<?php
/**
 * Created by PhpStorm.
 * User: alexariza
 * Date: 10/18/18
 * Time: 5:44 PM
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

    /**
     * @param AddDepartureZoneCommand $command
     * @return DepartureZone
     */

    public function __invoke(AddDepartureZoneCommand $command): DepartureZone
    {
        $departurezone = new DepartureZone();
        $departurezone->setName($command->getName());
        $departurezone->setDescription($command->getDescription());

        $this->departureZoneRepository->add($departurezone);


        return $departurezone;
    }
}