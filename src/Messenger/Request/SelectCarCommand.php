<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 09/11/2018
 * Time: 16:58
 */

namespace App\Messenger\Request;


use App\Entity\Journey;
use App\Entity\User;

class SelectCarCommand
{

    /**
     * @var \DateTimeInterface
     */
    private $dateTime;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Journey
     */
    private $journey;

    public function __construct( \DateTimeInterface $dateTime , User $user , Journey $journey)
    {

        $this->dateTime = $dateTime;
        $this->user = $user;

        $this->journey = $journey;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateTime(): \DateTimeInterface
    {
        return $this->dateTime;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return Journey
     */
    public function getJourney(): Journey
    {
        return $this->journey;
    }
}