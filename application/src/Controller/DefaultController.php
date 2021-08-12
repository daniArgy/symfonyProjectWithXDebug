<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class DefaultController extends AbstractController
{

    public function index(): Response
    {
        $variable= 'hopla';
        $variable1= 'hopla';
        $variable13= $this->doWhatever(30);


        return $this->render('Default\index.html.twig', ['v' => $variable,'v2' =>  $variable1,'v3' => $variable13]);
    }

    private function doWhatever(int $lenght): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $lenght; $i++) {
            $index = random_int(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}