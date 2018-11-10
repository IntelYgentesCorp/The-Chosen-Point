<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 09/11/2018
 * Time: 22:41
 */

namespace App\Messenger\Request;


use App\Entity\Journey;

class ConfirmTravelCommand
{
    /**
     * @var \DateTime
     */
    private $time;
    /**
     * @var Journey
     */
    private $journey;
    /**
     * @var int
     */
    private $idRequest;

    public function __construct(int $idRepository,\DateTime $time , Journey $journey)
    {

        $this->time = $time;
        $this->journey = $journey;
        $this->idRequest = $idRepository;
    }

    /**
     * @return \DateTime
     */
    public function getTime(): \DateTime
    {
        return $this->time;
    }

    /**
     * @return Journey
     */
    public function getJourney(): Journey
    {
        return $this->journey;
    }

    /**
     * @return int
     */
    public function getIdRequest(): int
    {
        return $this->idRequest;
    }



}