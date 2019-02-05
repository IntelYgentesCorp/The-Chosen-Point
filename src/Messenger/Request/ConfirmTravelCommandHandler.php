<?php

namespace App\Messenger\Request;

use App\Repository\RequestRepository;

class ConfirmTravelCommandHandler
{
    /**
     * @var RequestRepository
     */
    private $requestRepository;

    public function __construct(RequestRepository $requestRepository)
    {

        $this->requestRepository = $requestRepository;
    }

    public function __invoke(ConfirmTravelCommand $command)
    {
        $idRequest= $command->getIdRequest();

        $request = $this->requestRepository->find($idRequest);

        if(!$request){
            throw new \RuntimeException();
        }

        $request->accept();

        $journey = $request->getJourney();
        $seats = $journey->getSeats();
        $journey->setSeats($seats - 1);


        return($request);

    }
}
