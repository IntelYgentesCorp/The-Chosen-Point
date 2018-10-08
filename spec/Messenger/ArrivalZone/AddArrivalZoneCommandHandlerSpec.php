<?php

namespace spec\App\ArrivalZone\Place;


use App\Entity\Place;
use App\Messenger\Place\AddPlaceCommand;
use App\Messenger\Place\AddPlaceCommandHandler;
use App\Repository\PlaceRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddPlaceCommandHandlerSpec extends ObjectBehavior
{
    public function let(PlaceRepository $placeRepository)
    {
        $this->beConstructedWith($placeRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AddPlaceCommandHandler::class);
    }

    function it_saves_a_new_place(
        PlaceRepository $placeRepository,
        AddPlaceCommand $command
    )
    {
        $command->getName()->willReturn('Paraninfo')->shouldBeCalled();
        $command->getDescription()->willReturn(null)->shouldBeCalled();

        $place = new Place();
        $place->setName('Paraninfo');

        $placeRepository->add($place)->shouldBeCalled();

        $this($command)->shouldBeLike($place);
    }
}