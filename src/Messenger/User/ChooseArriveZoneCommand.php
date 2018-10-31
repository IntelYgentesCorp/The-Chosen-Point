<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Javi y Alex  The Chosen Point
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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

    public function getArrivalZoneId(): int
    {
        return $this->arrivalZoneId;
    }
}
