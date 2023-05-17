<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/', name: 'homepage')]
class DefaultController extends AbstractController{

    #[Route('/')]
    public function index():Response
    {
        return $this->render('index.html.twig');
    }
}