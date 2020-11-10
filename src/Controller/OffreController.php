<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Repository\OffreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffreController extends AbstractController
{
    /**
     * @Route("/offres/{id}", name="offre_show")
     */
    public function index(Offre $offre)
    {

        return $this->render('offre/index.html.twig', [
            'offre' => $offre,
        ]);
    }
}
