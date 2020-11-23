<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offre;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UpdatePostController extends AbstractController
{
    /**
     * @Route("/update_post/{id}", name="update_post")
     */
    public function index(Offre $offre, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createFormBuilder($offre)
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
            ->add("Modifier", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-info"
                ]
            ])
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
