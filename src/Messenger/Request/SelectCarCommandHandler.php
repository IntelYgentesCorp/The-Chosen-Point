<?php

namespace App\Messenger\Request;

use App\Entity\Request;
use App\Repository\RequestRepository;

class SelectCarCommandHandler
{

    /**
     * @var RequestRepository
     */
    private $requestRepository;

    public function __construct(RequestRepository $requestRepository)
    {

        $this->requestRepository = $requestRepository;
    }

    public function __invoke(SelectCarCommand $command)
    {
        $journey=$command->getJourney();
        $user=$command->getUser();


        $request= new Request();

        $request->setUser($user);
        $request->setJourney($journey);
        $request->setCreatedAt($command->getDateTime());
        $request->setIsAccepted(false);

        $this->requestRepository->add($request);

        return($request);


    }
}
