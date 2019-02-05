<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GreetingGeneratorController extends AbstractController
{
    /**
     * @Route("/greeting/generator", name="greeting_generator")
     */
    public function index()
    {
        return $this->render('greeting_generator/index.html.twig', [
            'controller_name' => 'GreetingGeneratorController',
        ]);
    }


}
