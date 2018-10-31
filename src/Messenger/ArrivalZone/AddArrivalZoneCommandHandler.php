<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Messenger\ArrivalZone;

use App\Entity\ArrivalZone;
use App\Repository\ArrivalZoneRepository;

class AddArrivalZoneCommandHandler
{
    /**
     * @var ArrivalZoneRepository
     */
    private $arrivalzoneRepository;

    public function __construct(ArrivalZoneRepository $arrivalzoneRepository)
    {
        $this->arrivalzoneRepository = $arrivalzoneRepository;
    }

    public function __invoke(AddArrivalZoneCommand $command): ArrivalZone
    {
        $arrivalzone = new ArrivalZone();
        $arrivalzone->setName($command->getName());
        $arrivalzone->setDescription($command->getDescription());

        $this->arrivalzoneRepository->add($arrivalzone);

        return $arrivalzone;
    }
}
