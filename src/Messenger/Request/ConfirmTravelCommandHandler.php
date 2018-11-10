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
        $journey = $command->getJourney();
        $seats = $journey->getSeats();
        $time = $command->getTime();

        $request = $this->requestRepository->find($idRequest);

        $request->setAcceptedAt($time);
        $journeyRequest=$request->getJourney();
        $journeyRequest->setSeats($seats - 1);
        $request->setIsAccepted(true);

        return($request);

    }
}
