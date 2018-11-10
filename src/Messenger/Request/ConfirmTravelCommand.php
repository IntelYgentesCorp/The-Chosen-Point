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
     * @var int
     */
    private $idRequest;

    public function __construct(int $idRepository)
    {


        $this->idRequest = $idRepository;
    }


    /**
     * @return int
     */
    public function getIdRequest(): int
    {
        return $this->idRequest;
    }



}