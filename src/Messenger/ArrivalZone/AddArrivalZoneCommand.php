<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 08/10/2018
 * Time: 08:57
 */

namespace App\Messenger\ArrivalZone;



class AddArrivalZoneCommand
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var null|string
     */
    private $description;

    public function __construct(string $name, ?string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }



}