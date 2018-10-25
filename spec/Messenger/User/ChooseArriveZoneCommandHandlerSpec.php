<?php

namespace spec\App\Messenger\User;

use App\Entity\ArrivalZone;
use App\Entity\User;
use App\Messenger\User\ChooseArriveZoneCommandHandler;
use App\Messenger\User\ChooseArriveZoneCommand;
use App\Repository\ArrivalZoneRepository;
use App\Repository\UserRepository;
use PhpSpec\ObjectBehavior;

class ChooseArriveZoneCommandHandlerSpec extends ObjectBehavior
{

    /**
     * @param ArrivalZoneRepository|\PhpSpec\Wrapper\Collaborator $arrivalZoneRepository
     */
    public function let(ArrivalZoneRepository $arrivalZoneRepository)
    {
        $this->beConstructedWith($arrivalZoneRepository);
    }

    function it_chooses_arrival_zone(ArrivalZoneRepository $arrivalZoneRepository, ChooseArriveZoneCommand $command, ArrivalZone $arrivalZone)
    {
        $command->getArrivalZoneId()->willReturn(3)->shouldBeCalled();

        $arrivalZoneRepository->find(3)->willReturn($arrivalZone)->shouldBeCalled();

        $this($command);
    }

    public function it_throws_exception_if_arrival_zone_not_found(ArrivalZoneRepository $arrivalZoneRepository, ChooseArriveZoneCommand $command)
    {
        $command->getArrivalZoneId()->willReturn(3)->shouldBeCalled();

        $arrivalZoneRepository->find(3)->willReturn(null)->shouldBeCalled();

        $this->shouldThrow(\RuntimeException::class)->during('__invoke', [$command]);
    }
}
