<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 25/10/2018
 * Time: 17:00
 */

namespace App\Messenger\Journey;


class RegisterJourneyCommand
{


    /**
     * @var int
     */
    private $userId;
    /**
     * @var int
     */
    private $departureZoneId;
    /**
     * @var int
     */
    private $arrivalZoneId;
    /**
     * @var int
     */
    private $seat;
    /**
     * @var \DateTime
     */
    private $departureTime;

    public function __construct(int $userId , int $departureZoneId , int $arrivalZoneId , int $seat , \DateTime $departureTime)
    {

        $this->userId = $userId;
        $this->departureZoneId = $departureZoneId;
        $this->arrivalZoneId = $arrivalZoneId;
        $this->seat = $seat;
        $this->departureTime = $departureTime;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getDepartureZoneId(): int
    {
        return $this->departureZoneId;
    }

    /**
     * @return int
     */
    public function getArrivalZoneId(): int
    {
        return $this->arrivalZoneId;
    }

    /**
     * @return int
     */
    public function getSeat(): int
    {
        return $this->seat;
    }

    /**
     * @return \DateTime
     */
    public function getDepartureTime(): \DateTime
    {
        return $this->departureTime;
    }

}