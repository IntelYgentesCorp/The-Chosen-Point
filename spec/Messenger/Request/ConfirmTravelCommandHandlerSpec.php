<?php

namespace spec\App\Messenger\Request;

use App\Entity\Journey;
use App\Entity\Request;
use App\Entity\User;
use App\Messenger\Request\ConfirmTravelCommand;
use App\Messenger\Request\ConfirmTravelCommandHandler;
use App\Messenger\Request\SelectCarCommand;
use App\Repository\RequestRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfirmTravelCommandHandlerSpec extends ObjectBehavior
{
    public function let(RequestRepository $requestRepository){
        $this->beConstructedWith($requestRepository);
    }

    public function it_confirm_travel(RequestRepository $requestRepository , ConfirmTravelCommand $command,
                                        \DateTime $dateTime , Request $request , Journey $journey)
    {

        $command->getIdRequest()->willReturn(4)->shouldBeCalled();
        $command->getTime()->willReturn($dateTime)->shouldBeCalled();
        $command->getJourney()->willReturn($journey)->shouldBeCalled();
        $journey->getSeats()->willReturn(3)->shouldBeCalled();

        $requestRepository->find(4)->willReturn($request)->shouldBeCalled();

        $request->setIsAccepted(True);
        $request->setAcceptedAt($dateTime);
        $journeyRequest = $request->getJourney();
        $journeyRequest->setSeats(3-1);


        $this($command)->ShouldBeLike($request);


    }

}

