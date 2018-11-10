<?php

namespace spec\App\Messenger\Request;

use App\Entity\Journey;
use App\Entity\Request;
use App\Entity\User;
use App\Messenger\Request\SelectCarCommand;
use App\Messenger\Request\SelectCarCommandHandler;
use App\Repository\RequestRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SelectCarCommandHandlerSpec extends ObjectBehavior
{
    public function let(RequestRepository $requestRepository){

        $this->beConstructedWith($requestRepository);

    }

    public function its_select_car(User $user , RequestRepository $requestRepository , Request $request ,
                                   SelectCarCommand $command
                                    , Journey $journey){



        $command->getUser()->willReturn($user)->shouldBeCalled();
        $command->getJourney()->willReturn($journey)->shouldBeCalled();

        $requestRepository->newInstance()->willReturn($request)->shouldBeCalled();

        $request->setUser($user)->shouldBeCalled();
        $request->setJourney($journey)->shouldBeCalled();

        $requestRepository->add($request)->shouldBeCalled();

        $this($command)->shouldBeLike($request);



    }
}
