<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UpdatePostController extends AbstractController
{
    /**
     * @Route("/update_post/{id}", name="update_post")
     */
    public function index(Offre $offre, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createFormBuilder($offre)
            ->add("title")
            ->add("description")
            ->add("adresse")
            ->add("ville")
            ->add("code_postal")
            ->add("date_crea")
            ->add("end_mission")
            ->add("contrat")
            ->add("type_contrat")
            ->add("Modifier", SubmitType::class)
            ->getForm();
        //$form ->setP
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //dd($form);
            $em->persist($offre);
            $em->flush();
        }
        return $this->render('update_post/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
