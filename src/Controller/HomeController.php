<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(OffreRepository $ripo): Response
    {
        $offres = $ripo->findAll();
        return $this->render('home/index.html.twig', [
            'data' => $offres,
        ]);
    }
}
