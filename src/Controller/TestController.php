<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/cpu", name="cpu")
     */
    public function cpu(): Response
    {
        // CPU intensive task
        $start = microtime(true);
        $array = [];
        for ($i=0; $i < 30000; $i++) { 
            $array[] = $i;
        }
        foreach ($array as $value) {
            array_shift($array);
        }
        $end = microtime(true);
        $time = $end - $start;

        return $this->render('test/cpu.html.twig', ['time' => $time]);
    }
}
