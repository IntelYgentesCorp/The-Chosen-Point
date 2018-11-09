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

    public function its_select_car(User $user , RequestRepository $requestRepository , SelectCarCommand $command
                                    ,\DateTimeInterface $dateTime , Journey $journey){


        $command->getDateTime()->willReturn($dateTime)->shouldBeCalled();
        $command->getUser()->willReturn($user)->shouldBeCalled();
        $command->getJourney()->willReturn($journey)->shouldBeCalled();

        $request=new Request();

        $request->setCreatedAt($dateTime);
        $request->setUser($user);
        $request->setJourney($journey);

        $requestRepository->add($request)->shouldBeCalled();

        $this($command)->shouldBeLike($request);



    }
}
