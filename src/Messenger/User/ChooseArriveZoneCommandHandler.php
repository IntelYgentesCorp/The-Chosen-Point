<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Messenger\User;

use App\Repository\ArrivalZoneRepository;

class ChooseArriveZoneCommandHandler
{
    /**
     * @var ArrivalZoneRepository
     */
    private $arrivalZoneRepository;

    public function __construct(ArrivalZoneRepository $arrivalZoneRepository)
    {
        $this->arrivalZoneRepository = $arrivalZoneRepository;
    }

    public function __invoke(ChooseArriveZoneCommand $command)
    {
        $arrivalZoneId = $command->getArrivalZoneId();
        $arrivalZone = $this->arrivalZoneRepository->find($arrivalZoneId);

        if (!$arrivalZone) {
            throw new \RuntimeException();
        }
    }
}
