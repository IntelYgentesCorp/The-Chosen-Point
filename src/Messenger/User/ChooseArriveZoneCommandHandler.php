<?php

namespace App\Messenger\User;


use App\Repository\ArrivalZoneRepository;
use http\Exception\RuntimeException;

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

     if(!$arrivalZone)
     {
         throw new \RuntimeException();
     }
  }
}
