<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Messenger\Journey;

use App\Entity\Journey;
use App\Repository\ArrivalZoneRepository;
use App\Repository\DepartureZoneRepository;
use App\Repository\JourneyRepository;
use App\Repository\UserRepository;

class RegisterJourneyCommandHandler
{
    /**
     * @var JourneyRepository
     */
    private $journeyRepository;
    /**
     * @var DepartureZoneRepository
     */
    private $departureZoneRepository;
    /**
     * @var ArrivalZoneRepository
     */
    private $arrivalZoneRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * RegisterJourneyCommandHandler constructor.
     */
    public function __construct(JourneyRepository $journeyRepository , DepartureZoneRepository $departureZoneRepository,
                                ArrivalZoneRepository $arrivalZoneRepository, UserRepository $userRepository)
    {
        $this->journeyRepository = $journeyRepository;
        $this->departureZoneRepository = $departureZoneRepository;
        $this->arrivalZoneRepository = $arrivalZoneRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke(RegisterJourneyCommand $command)
    {
        $driverId = $command->getUserId();
        $driver = $this->userRepository->find($driverId);
        $departureZoneId = $command->getDepartureZoneId();
        $departureZone = $this->departureZoneRepository->find($departureZoneId);
        $arrivalZoneId = $command->getArrivalZoneId();
        $arrivalZone = $this->arrivalZoneRepository->find($arrivalZoneId);

        $journey = new Journey();

        $journey->setArrivalZone($arrivalZone);
        $journey->setDepartureZone($departureZone);
        $journey->setDriver($driver);
        $journey->setDepartureAt($command->getDepartureTime());
        $journey->setSeats($command->getSeat());

        $this->journeyRepository->add($journey);

        return $journey;
    }
}
