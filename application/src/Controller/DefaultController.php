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
        $variable13= 'hopla';
var_dump($variable);

        return $this->render('Default\index.html.twig');
    }
}