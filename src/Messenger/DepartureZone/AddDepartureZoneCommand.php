<?php
/**
 * Created by PhpStorm.
 * User: alexariza
 * Date: 10/18/18
 * Time: 5:32 PM
 */

namespace App\Messenger\DepartureZone;

class AddDepartureZoneCommand
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