<?php

namespace spec\App\Messenger\Journey;

use App\Entity\ArrivalZone;
use App\Entity\DepartureZone;
use App\Entity\Journey;
use App\Entity\User;
use App\Messenger\Journey\RegisterJourneyCommand;
use App\Messenger\Journey\RegisterJourneyCommandHandler;
use App\Repository\ArrivalZoneRepository;
use App\Repository\DepartureZoneRepository;
use App\Repository\JourneyRepository;
use App\Repository\UserRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegisterJourneyCommandHandlerSpec extends ObjectBehavior
{
    public function let(JourneyRepository $journeyRepository , DepartureZoneRepository $departureZoneRepository , ArrivalZoneRepository $arrivalZoneRepository , UserRepository $userRepository)
    {
        $this->beConstructedWith($journeyRepository , $departureZoneRepository , $arrivalZoneRepository , $userRepository);

    }

    function it_save_new_journey(JourneyRepository $journeyRepository, RegisterJourneyCommand $command
                                 , \DateTime $dateTime , ArrivalZoneRepository $arrivalZoneRepository ,
                                 DepartureZoneRepository $departureZoneRepository , ArrivalZone $arrivalZone ,
                                   DepartureZone $departureZone  , UserRepository $userRepository , User $user)
    {
        $command->getArrivalZoneId()->willReturn(3)->shouldBeCalled();
        $command->getDepartureTime()->willReturn($dateTime)->shouldBeCalled();
        $command->getDepartureZoneId()->willReturn(4)->shouldBeCalled();
        $command->getSeat()->willReturn(5)->shouldBeCalled();
        $command->getUserId()->willReturn(3)->shouldBeCalled();

        $arrivalZoneRepository->find(3)->willReturn($arrivalZone)->shouldBeCalled();
        $departureZoneRepository->find(4)->willReturn($departureZone)->shouldBeCalled();
        $userRepository->find(3)->willReturn($user)->shouldBeCalled();

        $journeyRepository->add(Argument::type(Journey::class))->shouldBeCalled();

        $this($command);
    }



}
