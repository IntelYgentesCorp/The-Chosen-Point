<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\App\Messenger\DepartureZone;

use App\Entity\DepartureZone;
use App\Messenger\DepartureZone\AddDepartureZoneCommand;
use App\Repository\DepartureZoneRepository;
use PhpSpec\ObjectBehavior;

class AddDepartureZoneCommandHandlerSpec extends ObjectBehavior
{
    /**
     * @param \PhpSpec\Wrapper\Collaborator|DepartureZoneRepository $departureZoneRepository
     */
    public function let(DepartureZoneRepository $departureZoneRepository)
    {
        $this->beConstructedWith($departureZoneRepository);
    }

    /**
     * @param DepartureZoneRepository|\PhpSpec\Wrapper\Collaborator $departureZoneRepository
     * @param AddDepartureZoneCommand|\PhpSpec\Wrapper\Collaborator $command
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function it_saves_a_new_departure_zone(DepartureZoneRepository $departureZoneRepository, AddDepartureZoneCommand $command)
    {
        $command->getName()->willReturn('El Punto')->shouldBeCalled();
        $command->getDescription()->willReturn(null)->shouldBeCalled();

        $departureZone = new DepartureZone();
        $departureZone->setName('El Punto');

        $departureZoneRepository->add($departureZone)->shouldBeCalled();

        $this($command)->shouldBeLike($departureZone);
    }
}
