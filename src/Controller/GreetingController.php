<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GreetingController extends AbstractController
{
    /**
     * @Route("/greeting", name="greeting")
     */
    public function index()
    {
        return $this->render('greeting/index.html.twig', [
            'controller_name' => 'GreetingController',
        ]);
    }
}
