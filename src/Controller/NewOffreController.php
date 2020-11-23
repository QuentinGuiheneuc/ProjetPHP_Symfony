<?php

namespace App\Controller;

use App\Entity\Offre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class NewOffreController extends AbstractController
{
    /**
     * @Route("/new_offre", name="new_offre")
     */
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $newOffre = new Offre;
        $form = $this->createFormBuilder($newOffre)
            ->add("title", TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add("description", TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add(
                "adresse",
                TextareaType::class,
                [
                    "attr" => [
                        "class" => "form-control"
                    ]
                ]
            )
            ->add("ville", TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add(
                "code_postal",
                TextareaType::class,
                [
                    "attr" => [
                        "class" => "form-control"
                    ]
                ]
            )
            ->add(
                "date_crea"
            )
            ->add("end_mission")
            ->add("contrat", TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add("type_contrat", TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add("Ajouter", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-info"
                ]
            ])
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
