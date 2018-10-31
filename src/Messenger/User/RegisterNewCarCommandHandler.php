<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        $userId = $command->getUserId();
        $user = $this->userRepository->find($userId);

        if (!$user) {
            throw new \RuntimeException();
        }

        $user->setPlate($command->getPlate());
    }
}
