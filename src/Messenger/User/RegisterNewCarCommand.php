<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 18/10/2018
 * Time: 17:29
 */

namespace App\Messenger\User;


class RegisterNewCarCommand
{
    /**
     * @var int
     */
    private $userId;
    /**
     * @var string
     */
    private $plate;

    public function __construct(int $userId , string $plate)
 {

     $this->userId = $userId;
     $this->plate = $plate;
 }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getPlate(): string
    {
        return $this->plate;
    }


}