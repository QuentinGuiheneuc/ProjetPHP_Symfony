<?php

namespace App\Controller;

use App\Entity\Offre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewOffreController extends AbstractController
{
    /**
     * @Route("/new_offre", name="new_offre")
     */
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $newOffre = new Offre;
        $form = $this->createFormBuilder($newOffre)
            ->add("title")
            ->add("description")
            ->add("adresse")
            ->add("ville")
            ->add("code_postal")
            ->add("date_crea")
            ->add("end_mission")
            ->add("contrat")
            ->add("type_contrat")
            ->add("Ajouter", SubmitType::class)
            ->getForm();

        $newOffre->setDateUpdate(new \DateTime);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //dd($form);
            $em->persist($newOffre);
            $em->flush();
        }

        return $this->render('new_offre/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
