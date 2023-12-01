<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class MainController extends AbstractController

{
    #[Route('/', name: 'main',)]
    public function index(): Response
    {
        return $this->render('Main/main.html.twig', );
    }

}