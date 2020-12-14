<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class LogInFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("email", TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add(
                "password",
                PasswordType::class,
                [
                    "attr" => [
                        "class" => "form-control"
                    ]
                ]
            )
             ->add("LogIn", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-info"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
