<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Model\Chart;


#[Route('/')]
class MainController extends AbstractController

{
    #[Route('/', name: 'main',)]
    public function index(): Response
    {
        return $this->render('./Main/main.html.twig', );
    }

}

