<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/')]
class DefaultController extends AbstractController{

    #[Route('/dashboard', name: 'dashboard_index')]
    public function index():Response
    {
        $user = $this->getUser();
       
        return $this->render('index.html.twig', ["user" => $user]);
    }
}