<?php

namespace App\Messenger\User;

use App\Repository\UserRepository;

class RegisterNewCarCommandHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(RegisterNewCarCommand $command)
    {
        $userId=$command->getUserId();
        $user = $this->userRepository->find($userId);

        if (!$user) {
            throw new \RuntimeException();
        }

        $user->setPlate($command->getPlate());
    }
}
