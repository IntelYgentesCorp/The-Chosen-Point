<?php

namespace spec\App\Messenger\User;

use App\Entity\User;
use App\Messenger\User\RegisterNewCarCommand;
use App\Messenger\User\RegisterNewCarCommandHandler;
use App\Repository\UserRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegisterNewCarCommandHandlerSpec extends ObjectBehavior
{
    /**
     * @param UserRepository|\PhpSpec\Wrapper\Collaborator $userRepository
     */
    public function let(UserRepository $userRepository)
    {
        $this->beConstructedWith($userRepository);
    }

    function it_save_new_car(UserRepository $userRepository,RegisterNewCarCommand $command , User $user){

        $command->getUserId()->willReturn(3)->shouldBeCalled();
        $command->getPlate()->willReturn('6082AKH')->shouldBeCalled();

        $userRepository->find(3)->willReturn($user)->shouldBeCalled();
        $user->setPlate('6082AKH')->shouldBeCalled();

        $this($command);

    }

    public function it_throw_exception_if_user_not_found(UserRepository $userRepository,RegisterNewCarCommand $command)
    {
        $command->getUserId()->willReturn(3)->shouldBeCalled();

        $userRepository->find(3)->willReturn(null)->shouldBeCalled();

        $this->shouldThrow(\RuntimeException::class)->during('__invoke', [$command]);
    }
}
