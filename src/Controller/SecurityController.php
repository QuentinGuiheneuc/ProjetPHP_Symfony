<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LogInFormType;
use App\Form\RegisterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/log_in", name="log_in")
     */
    public function index(Request $request,UserPasswordEncoderInterface $encoder,EntityManagerInterface $em): Response
    {
        $user = new User();
        $FormLogIn = $this->createForm(LogInFormType::class, $user);
        $FormLogIn->handleRequest($request);
        // if ($FormLogIn->isSubmitted() && $FormLogIn->isValid()){
        //     $pass = $user->getPassword();
        //     $encoded = $encoder->encodePassword($user, $pass);
        //     $user = 
        //     $role = ['ROLE_USER'];
        //     $user->setRoles($role);
        //     $em->persist($user);
        //     $em->flush();
        // }
        return $this->render('security/log_in.html.twig', [
            'formLogIn' => $FormLogIn->createView(),
        ]);
    }
    /**
     * @Route("/log_out", name="log_out")
     */
    public function logout()
    {
    }
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request,UserPasswordEncoderInterface $encoder,EntityManagerInterface $em): Response
    {
        $user = new User();
        $formRegister = $this->createForm(RegisterFormType::class, $user);
        $formRegister->handleRequest($request);
        if ($formRegister->isSubmitted() && $formRegister->isValid()){

            $pass = $user->getPassword();
            $encoded = $encoder->encodePassword($user, $pass);
            $user->setPassword($encoded);
            $role = ['ROLE_USER'];
            $user->setRoles($role);
            $em->persist($user);
            $em->flush();
        }
        return $this->render('security/register.html.twig', [
            'formRegister' => $formRegister->createView(),
        ]);
    }
}
