<?php

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

    /**
     * @param AddArrivalZoneCommand $command
     * @return ArrivalZone
     */

    public function __invoke(AddArrivalZoneCommand $command): ArrivalZone
    {
        $arrivalzone = new ArrivalZone();
        $arrivalzone->setName($command->getName());
        $arrivalzone->setDescription($command->getDescription());

        $this->arrivalzoneRepository->add($arrivalzone);


        return $arrivalzone;
    }
}