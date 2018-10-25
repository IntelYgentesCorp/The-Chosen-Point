<?php
/**
 * Created by PhpStorm.
 * User: alexariza
 * Date: 10/25/18
 * Time: 5:21 PM
 */

namespace App\Messenger\User;


class ChooseArriveZoneCommand
{
    /**
     * @var int
     */
    private $arrivalZoneId;

    public function __construct(int $arrivalZoneId)
    {
        $this->arrivalZoneId = $arrivalZoneId;
    }

    /**
     * @return int
     */
    public function getArrivalZoneId(): int
    {
        return $this->arrivalZoneId;
    }
}