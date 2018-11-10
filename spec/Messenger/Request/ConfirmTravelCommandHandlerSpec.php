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
                                        Request $request , Journey $journey )
    {

        $command->getIdRequest()->willReturn(4)->shouldBeCalled();

        $requestRepository->find(4)->willReturn($request)->shouldBeCalled();

        $request->accept()->shouldBeCalled();

        $request->getJourney()->willReturn($journey)->shouldBeCalled();
        $journey->getSeats()->willReturn(3)->shouldBeCalled();

        $journey->setSeats(3-1)->shouldBeCalled();


        $this($command)->shouldBeLike($request);


    }

}

