<?php

namespace spec\App\Messenger\ArrivalZone;



use App\Entity\ArrivalZone;
use App\Messenger\ArrivalZone\AddArrivalZoneCommand;
use App\Repository\ArrivalZoneRepository;
use PhpSpec\ObjectBehavior;

    class AddArrivalZoneCommandHandlerSpec extends ObjectBehavior
    {
        /**
         * @param \PhpSpec\Wrapper\Collaborator|ArrivalZoneRepository $arrivalZoneRepository
         */
        public function let(ArrivalZoneRepository $arrivalZoneRepository)
        {
            $this->beConstructedWith($arrivalZoneRepository);
        }


        /**
         * @param ArrivalZoneRepository|\PhpSpec\Wrapper\Collaborator $arrivalZoneRepository
         * @param AddArrivalZoneCommand|\PhpSpec\Wrapper\Collaborator $command
         * @throws \Doctrine\ORM\ORMException
         */

        function it_saves_a_new_arrival_zone(ArrivalZoneRepository $arrivalZoneRepository,
                                             AddArrivalZoneCommand $command)
        {
            $command->getName()->willReturn('Renfe')->shouldBeCalled();
            $command->getDescription()->willReturn(null)->shouldBeCalled();

            $arrivalZone = new ArrivalZone();
            $arrivalZone->setName('Renfe');

            $arrivalZoneRepository->add($arrivalZone)->shouldBeCalled();

            $this($command)->shouldBeLike($arrivalZone);

        }
    }
