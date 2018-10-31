<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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

    public function __construct(int $userId, int $departureZoneId, int $arrivalZoneId, int $seat, \DateTime $departureTime)
    {
        $this->userId = $userId;
        $this->departureZoneId = $departureZoneId;
        $this->arrivalZoneId = $arrivalZoneId;
        $this->seat = $seat;
        $this->departureTime = $departureTime;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getDepartureZoneId(): int
    {
        return $this->departureZoneId;
    }

    public function getArrivalZoneId(): int
    {
        return $this->arrivalZoneId;
    }

    public function getSeat(): int
    {
        return $this->seat;
    }

    public function getDepartureTime(): \DateTime
    {
        return $this->departureTime;
    }
}
