<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\App\Messenger\User;

use App\Entity\User;
use App\Messenger\User\RegisterNewCarCommand;
use App\Repository\UserRepository;
use PhpSpec\ObjectBehavior;

class RegisterNewCarCommandHandlerSpec extends ObjectBehavior
{
    /**
     * @param UserRepository|\PhpSpec\Wrapper\Collaborator $userRepository
     */
    public function let(UserRepository $userRepository)
    {
        $this->beConstructedWith($userRepository);
    }

    public function it_save_new_car(UserRepository $userRepository, RegisterNewCarCommand $command, User $user)
    {
        $command->getUserId()->willReturn(3)->shouldBeCalled();
        $command->getPlate()->willReturn('6082AKH')->shouldBeCalled();

        $userRepository->find(3)->willReturn($user)->shouldBeCalled();
        $user->setPlate('6082AKH')->shouldBeCalled();

        $this($command);
    }

    public function it_throw_exception_if_user_not_found(UserRepository $userRepository, RegisterNewCarCommand $command)
    {
        $command->getUserId()->willReturn(3)->shouldBeCalled();

        $userRepository->find(3)->willReturn(null)->shouldBeCalled();

        $this->shouldThrow(\RuntimeException::class)->during('__invoke', [$command]);
    }
}
